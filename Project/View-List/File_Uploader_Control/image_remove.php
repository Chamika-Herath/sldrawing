<?php

// Path to the image file
$imagePath = isset($_POST['pth_of_image']) ? "../../" . $_POST['pth_of_image'] : "";
$json = array();

// Check if the file exists
if (file_exists($imagePath)) {
    // Attempt to delete the file
    if (@unlink($imagePath)) {
        
    } else {
        $last_error = error_get_last();
        $state['error'] = "something went wrong: " . ($last_error['message'] ?? 'Unknown error');
        $json[] = $state;
    }
} else {
    $state['error'] = "image not found";
    $json[] = $state;
}

echo json_encode($json);
