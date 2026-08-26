<?php
include_once '../../imports/need/session_setup.php';
include_once '../../imports/need/DB.php';
include_once '../../Controllers/Main/sld_tutorials/sld_tutorials_LIST.php';

$json = array();

$tutorial_list = new sld_tutorials_LIST();
// Only fetch active records securely using the correct custom table definitions
$res = $tutorial_list->custom_query("SELECT * FROM sld_tutorials WHERE ast = 1 ORDER BY sdt DESC");

if ($res) {
    while ($row = $res->fetch_assoc()) {
        $data['id'] = $row['id'];
        $data['title'] = $row['title'];
        
        // Keep the original raw HTML matrix for powering editor interfaces and full views
        $data['description_raw'] = $row['description'];
        
        // Output standard HTML stripping to prevent rich HTML from tearing layout borders
        $raw_text = strip_tags(html_entity_decode($row['description']));
        $data['description'] = trim($raw_text);
        
        $data['difficulty_level'] = $row['difficulty_level'];
        $data['video_url'] = $row['video_url'];
        
        // Supply fallback thumbnail rendering if the user published it blindly without image attachments
        $data['thumbnail_url'] = !empty($row['thumbnail_url']) ? $row['thumbnail_url'] : '../../../assets/images/shark1.webp'; 
        
        $data['sdt'] = date("M d, Y", strtotime($row['sdt']));
        $json[] = $data;
    }
}

echo json_encode($json);
?>
