<?php
include_once '../../imports/need/session_setup.php';
include_once '../../imports/need/DB.php';

$json = array();

if (isset($_POST['id']) && isset($_SESSION['user_id'])) {
    
    $id = intval($_POST['id']);
    
    if ($id > 0) {
        $DB = new DataBase();
        $conn = $DB->get_data_base_connction();
        
        $sql = "UPDATE sld_tutorials SET ast = 0 WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            $data['error'] = "0";
            $data['message'] = "Tutorial successfully archived from public view!";
            $json[] = $data;
        } else {
            $data['error'] = "1";
            $data['message'] = "Error actively trying to archive structural matrix.";
            $json[] = $data;
        }
    } else {
        $data['error'] = "1";
        $data['message'] = "Invalid payload ID trapped linearly.";
        $json[] = $data;
    }
} else {
    $data['error'] = "1";
    $data['message'] = "Unauthorized access attempt blocked securely.";
    $json[] = $data;
}

echo json_encode($json);
?>
