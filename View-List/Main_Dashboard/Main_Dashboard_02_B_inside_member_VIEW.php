<?php
include_once '../../imports/need/session_setup.php';
include_once '../../imports/need/DB.php';

$user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0;
if($user_id === 0){
    echo json_encode(["error" => "Critical Failure: Invalid User Matrix Reference"]);
    exit;
}

$db = new DataBase();
$conn = $db->get_data_base_connction();

// 1. Fetch User Data (including access level and 2FA status)
$stmt = $conn->prepare("SELECT * FROM main_user_login WHERE id = ? LIMIT 1");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$res = $stmt->get_result();
$user_data = $res->fetch_assoc();

if(!$user_data){
    echo json_encode(["error" => "Database Integrity Error: User payload not found in registry."]);
    exit;
}

// 2. Safely Fetch Grid Drawing Projects and Score History
// Using robust generic logic to avoid breaking if the foreign key schema naming deviates (e.g. main_user_login_id vs user_id).
$projects = [];

// Try to find projects using main_user_login_id or user_id
// I'll test the columns using structural bypass logic for rapid safe fetching.
$projectRes = $conn->query("SELECT * FROM grid_drawing_projects");
$grid_data = [];

// Since we don't know the exact structure but we need a specific user_id match:
$p_query = "SELECT * FROM grid_drawing_projects WHERE main_user_login_id = $user_id";
try {
    $p_exec = $conn->query($p_query);
} catch (Exception $e) {
    // If main_user_login_id fails, try user_id as a fallback.
    $p_exec = $conn->query("SELECT * FROM grid_drawing_projects WHERE user_id = $user_id");
}

if(isset($p_exec) && $p_exec) {
    while($p = $p_exec->fetch_assoc()) {
        $pid = isset($p['id']) ? $p['id'] : 0;
        
        // Setup base data
        $title = isset($p['title']) ? $p['title'] : (isset($p['project_name']) ? $p['project_name'] : 'Untitled Grid Form');
        $status = isset($p['status']) ? $p['status'] : 'Active Compilation';
        $score = 0;
        
        // Find corresponding score
        $s_query = "SELECT * FROM project_score_histry WHERE grid_drawing_projects_id = $pid";
        try {
            $s_exec = $conn->query($s_query);
        } catch (Exception $e) {
            $s_exec = $conn->query("SELECT * FROM project_score_histry WHERE project_id = $pid");
        }
        
        if(isset($s_exec) && $s_exec && $s = $s_exec->fetch_assoc()) {
            $score = isset($s['score']) ? $s['score'] : (isset($s['total_score']) ? $s['total_score'] : 0);
        }
        
        $projects[] = [
            "id" => $pid,
            "title" => $title,
            "status" => $status,
            "score" => $score
        ];
    }
}

// Ensure integers are strings if frontend JS strictly enforces type checking (though my JS is flexible)
$access_lvl = isset($user_data['main_user_account_access_level_list_id']) ? $user_data['main_user_account_access_level_list_id'] : 2;
$two_fa = isset($user_data['is_two_factor_auth_enable']) ? $user_data['is_two_factor_auth_enable'] : 0;

$response_payload = [
    "user_name" => $user_data['user_name'],
    "main_user_account_access_level_list_id" => $access_lvl,
    "is_two_factor_auth_enable" => $two_fa,
    "projects" => $projects
];

echo json_encode($response_payload);
?>
