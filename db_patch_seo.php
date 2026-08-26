<?php
include './imports/need/DB.php';
$DB = new DataBase();
$conn = $DB->get_data_base_connction(); // Using the correct method structurally
$sql = "ALTER TABLE sld_tutorials 
        ADD COLUMN seo_keywords TEXT NULL AFTER video_url, 
        ADD COLUMN seo_description TEXT NULL AFTER seo_keywords";
if($conn->query($sql) === TRUE) {
    echo "Columns Successfully Added!";
} else {
    echo "Error processing matrix: " . $conn->error;
}
?>
