<?php
include_once '../../imports/need/session_setup.php';
include_once '../../imports/need/DB.php';
include_once '../../Controllers/Main/main_user_login/main_user_login_LIST.php';

$main_user_login_LIST_obj = new main_user_login_LIST();
$main_user_login_LIST_obj->filter_by_ast(1);
$result = $main_user_login_LIST_obj->get_result();

$json = array();

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $state['id'] = $row['id'];
        $state['user_name'] = $row['user_name'];
        
        // Generate Initials safely
        $temp_name = "US"; // default
        if(isset($row['user_name']) && !empty($row['user_name'])){
            $temp_name = strtoupper(substr($row['user_name'], 0, 2));
        }
        $state['initials'] = $temp_name;
        
        // Date placeholder (since we don't know if date is in the table directly named 'date_start', we just use a generic or check)
        if(isset($row['date_start'])) {
            $state['date'] = date("M d, Y", strtotime($row['date_start']));
        } else {
            $state['date'] = "Active Member";
        }

        $json[] = $state;
    }
}

echo json_encode($json);
?>
