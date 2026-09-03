<?php
include_once '../../imports/need/session_setup.php';
include_once '../../imports/need/DB.php';
include_once '../../Controllers/grid_drawing_projects/grid_drawing_projects_ADD_UPDATE.php';
include_once '../../Controllers/project_score_histry/project_score_histry_ADD_UPDATE.php';
include_once '../../imports/Company_Info/Company_Info_Variable_List.php';
include_once '../../imports/security/encrypt_decrypt.php';
include_once '../../imports/security/key_list.php';
include_once '../../Controllers/Main/Cook_Managment/Cook_Managing.php';

$json = array();
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get user login id from session or cookie
    $get_cookie_id = "0";
    if (isset($_SESSION['user_main_cook_id'])) {
        $get_cookie_id = $_SESSION['user_main_cook_id'];
    } else if (isset($_COOKIE['main_user_account_cook'])) {
        $get_cookie_id = $_COOKIE['main_user_account_cook'];
        $_SESSION['user_main_cook_id'] = $get_cookie_id;
    }

    $cookie_check_obj = new Cook_Management($get_cookie_id);
    if ($cookie_check_obj->check_login_availability()) {
        $main_user_login_id = $cookie_check_obj->get_user_id();
    } else {
        $json['status'] = 'error';
        $json['message'] = 'User is not logged in or invalid session.';
        echo json_encode($json);
        exit;
    }

    $project_id = isset($_POST['project_id']) ? $_POST['project_id'] : '';
    $score_histry_id = isset($_POST['score_histry_id']) ? $_POST['score_histry_id'] : '';

    if (empty($project_id) || empty($score_histry_id)) {
        $json['status'] = 'error';
        $json['message'] = 'Project ID or Score History ID is missing.';
        echo json_encode($json);
        exit;
    }

    $data_base_obj = new DataBase();

    // 1. Get reference image
    $sql_ref = "SELECT reference_img_url FROM grid_drawing_projects WHERE id = '" . $project_id . "' AND main_user_login_id = '" . $main_user_login_id . "'";
    $res_ref = $data_base_obj->get_result($sql_ref);
    if (!$res_ref || $res_ref->num_rows == 0) {
        $json['status'] = 'error';
        $json['message'] = 'Project not found.';
        echo json_encode($json);
        exit;
    }
    $ref_img_url = $res_ref->fetch_assoc()['reference_img_url'];

    // 2. Get sketch image from history
    $sql_sketch = "SELECT uploded_img_url FROM project_score_histry WHERE id = '" . $score_histry_id . "'";
    $res_sketch = $data_base_obj->get_result($sql_sketch);
    if (!$res_sketch || $res_sketch->num_rows == 0) {
        $json['status'] = 'error';
        $json['message'] = 'Score history record not found.';
        echo json_encode($json);
        exit;
    }
    $sketch_img_url = $res_sketch->fetch_assoc()['uploded_img_url'];

    // Absolute paths for cURL
    $ref_absolute_path = realpath('../../' . $ref_img_url);
    $sketch_absolute_path = realpath('../../' . $sketch_img_url);

    if (!$ref_absolute_path || !$sketch_absolute_path) {
        $json['status'] = 'error';
        $json['message'] = 'Could not find physical image files on the server.';
        echo json_encode($json);
        exit;
    }

    // 3. Send to Python API
    $api_url = "https://heraforce-sldrawing.hf.space/grade";
    //$api_url = "http://127.0.0.1:8000/grade";
    
    // Create cURL file objects
    $cfile_ref = new CURLFile($ref_absolute_path, mime_content_type($ref_absolute_path), basename($ref_absolute_path));
    $cfile_sketch = new CURLFile($sketch_absolute_path, mime_content_type($sketch_absolute_path), basename($sketch_absolute_path));

    $post_data = array(
        "reference_image" => $cfile_ref,
        "sketch_image" => $cfile_sketch
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curl_error = curl_error($ch);
    curl_close($ch);

    if ($http_code != 200 || $response === false) {
        $json['status'] = 'error';
        $json['message'] = 'Failed to connect to AI API. Make sure the Python server is running on port 8000. Error: ' . $curl_error;
        echo json_encode($json);
        exit;
    }

    $api_data = json_decode($response, true);

    if (!isset($api_data['status']) || $api_data['status'] !== 'success') {
        $json['status'] = 'error';
        $json['message'] = 'AI API returned an error: ' . (isset($api_data['detail']) ? $api_data['detail'] : 'Unknown error');
        echo json_encode($json);
        exit;
    }

    $score = $api_data['score'];
    // Convert feedback array into a single string for the comments column
    $feedback_str = implode("\n", $api_data['feedback']); 
    $heatmap_url = $api_data['heatmap_url'];

    // 4. Update project_score_histry with score and feedback
    $history_obj = new project_score_histry_ADD_UPDATE($main_user_login_id);
    $history_obj->set_id($score_histry_id);
    $history_obj->set_score($score);
    $history_obj->set_comments($feedback_str);
    $update_hist = $history_obj->process_update_record();

    if (!$update_hist) {
        $json['status'] = 'error';
        $json['message'] = 'Failed to save score: ' . $history_obj->get_error();
        echo json_encode($json);
        exit;
    }

    // 5. Update grid_drawing_projects step_05_complete
    $proj_obj = new grid_drawing_projects_ADD_UPDATE($main_user_login_id);
    $proj_obj->set_id($project_id);
    $proj_obj->is_step_05_complete();
    $update_proj = $proj_obj->process_update_record();

    if ($update_proj) {
        $json['status'] = 'success';
        $json['score'] = $score;
        $json['feedback'] = $api_data['feedback'];
        $json['heatmap_url'] = $heatmap_url;
        
        if (isset($api_data['ref_eyes'])) {
            $json['ref_eyes'] = $api_data['ref_eyes'];
        }
        if (isset($api_data['sketch_eyes'])) {
            $json['sketch_eyes'] = $api_data['sketch_eyes'];
        }
        
        $json['message'] = 'AI Check complete!';
    } else {
        $json['status'] = 'error';
        $json['message'] = 'Failed to update project: ' . $proj_obj->get_error();
    }

} else {
    $json['status'] = 'error';
    $json['message'] = 'Invalid request method.';
}

echo json_encode($json);
?>
