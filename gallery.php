<?php include_once './imports/need/session_setup.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    $get_title = "Art Gallery - Stunning Portrait & Digital Artworks | SLdrawing by Chamika Herath";
    $get_dis = "Browse through an exclusive gallery of digital art and stunning pencil portraits curated by Chamika Herath and Heraforce.";
    $get_key_words = "Chamika Herath, art gallery, digital artworks, portrait gallery, Heraforce, SLdrawing community, best drawings";
    include_once './Meta_Tag/Meta_Tag.php'; 
    ?>
</head>
<body>
    <?php 
    include_once './UxUI-Back/Needs/header.php';
    include_once './UxUI-Back/Main/gallery-content.php';
    include_once './UxUI-Back/Needs/footer.php';
    ?>
</body>
</html>
