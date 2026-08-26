<?php
include './imports/need/DB.php';
$DB = new DataBase();
$conn = $DB->get_data_base_connction();
$sql = "ALTER TABLE sld_tutorials ADD COLUMN seo_slug VARCHAR(255) NULL AFTER title";
if($conn->query($sql) === TRUE) {
    echo "Slug Column Successfully Added!";
} else {
    echo "Error processing matrix: " . $conn->error;
}
?>
