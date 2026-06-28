<?php
/**
 * SLdrawing Session and Environment Setup
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$get_title = "SLdrawing - Unlock Your Creative Potential";
$get_dis = "Learn portrait drawing, coloring, and grid techniques.";
$get_key_words = "art, drawing, tutorials, portraits, grid drawing";
$get_social_title = "SLdrawing - Express Yourself";
$get_social_dis = "The ultimate creative hub for artists.";
$image_fb = "/assets/images/shark.png";
$image_twitter = "/assets/images/shark.png";
$get_url = "http://localhost:8000";
?>
