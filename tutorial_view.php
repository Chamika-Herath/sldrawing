<?php 
include_once './imports/need/session_setup.php'; 
include_once './imports/need/DB.php';
include_once './Controllers/Main/sld_tutorials/sld_tutorials_LIST.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if($id == 0){
    header("Location: tutorials.php");
    exit;
}

$tutorial_list = new sld_tutorials_LIST();
$res = $tutorial_list->custom_query("SELECT * FROM sld_tutorials WHERE id = $id AND ast = 1 LIMIT 1");
$tut = $res ? $res->fetch_assoc() : null;
if(!$tut){
    header("Location: tutorials.php");
    exit;
}

$diff = strtoupper($tut['difficulty_level']);
$color = ($diff == 'BEGINNER') ? '#a855f7' : (($diff == 'INTERMEDIATE') ? '#00f3ff' : 'var(--primary)');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    $get_title = htmlspecialchars($tut['title']) . " - Tutorial | SLdrawing";
    // Construct small string for META text snippet
    $get_dis = substr(strip_tags(html_entity_decode($tut['description'])), 0, 150);
    $get_key_words = "Chamika Herath, drawing tutorials, " . $tut['difficulty_level'];
    include_once './Meta_Tag/Meta_Tag.php'; 
    ?>
    <style>
        .tutorial-content-body {
            color: var(--text);
            font-size: 17px;
            line-height: 1.8;
            word-wrap: break-word;
        }
        .tutorial-content-body img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 20px 0;
        }
        /* Style Quill Lists & Structural nodes appropriately */
        .tutorial-content-body ul, .tutorial-content-body ol {
            margin-left: 20px;
            padding-left: 10px;
            color: var(--text-dim);
            margin-bottom: 25px;
        }
        .tutorial-content-body h2, .tutorial-content-body h3 {
            color: #fff;
            margin-top: 30px;
            margin-bottom: 15px;
            font-weight: 700;
        }
        .tutorial-content-body a {
            color: var(--primary);
            text-decoration: underline;
        }
        .tutorial-video-wrapper {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 responsive aspect */
            padding-top: 25px;
            height: 0;
            margin-bottom: 40px;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.1);
        }
        .tutorial-video-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        /* Quill Alignment Translators */
        .tutorial-content-body .ql-align-center { text-align: center; }
        .tutorial-content-body .ql-align-right { text-align: right; }
        .tutorial-content-body .ql-align-justify { text-align: justify; }
    </style>
</head>
<body>
    <?php include_once './UxUI-Back/Needs/header.php'; ?>
    
    <main class="container section-padding" style="margin-top: 100px; max-width: 1200px; margin-bottom: 80px;">
        <!-- Return Path -->
        <a href="tutorials.php" style="color: var(--text-dim); text-decoration: none; font-size: 14px; display: inline-block; margin-bottom: 20px; transition: 0.3s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--text-dim)'">
            &#8592; Back to Library
        </a>
        
        <h1 style="font-size: 3rem; margin-bottom: 20px; color: var(--text); font-weight: 800; line-height: 1.1;"><?php echo htmlspecialchars($tut['title']); ?></h1>
        
        <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 40px; color: var(--text-dim); font-size: 14px;">
            <span style="color: <?php echo $color; ?>; font-weight: 700; background: rgba(255,255,255,0.05); padding: 5px 15px; border-radius: 50px;">
                <?php echo $diff; ?>
            </span>
            <span>Published: <?php echo date("F j, Y", strtotime($tut['sdt'])); ?></span>
        </div>

        <!-- Content Payload Surface Area -->
        <div class="tutorial-content-body glass" style="padding: 40px; border-radius: 20px; background: var(--surface);">
            <!-- Inject Raw HTML Payload from Database entirely untouched to preserve Quill rich text structures perfectly -->
            <?php echo $tut['description']; ?>
        </div>
    </main>

    <?php include_once './UxUI-Back/Needs/footer.php'; ?>
</body>
</html>
