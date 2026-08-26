<?php 
include_once './imports/need/session_setup.php'; 
include_once './imports/need/DB.php';
include_once './Controllers/Main/sld_tutorials/sld_tutorials_LIST.php';

$slug = isset($_GET['tutorial']) ? $_GET['tutorial'] : '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if($slug === '' && $id === 0){
    header("Location: tutorials.php");
    exit;
}

$DB = new DataBase();
$conn = $DB->get_data_base_connction();

if ($slug !== '') {
    $stmt = $conn->prepare("SELECT * FROM sld_tutorials WHERE seo_slug = ? AND ast = 1 LIMIT 1");
    $stmt->bind_param("s", $slug);
} else {
    $stmt = $conn->prepare("SELECT * FROM sld_tutorials WHERE id = ? AND ast = 1 LIMIT 1");
    $stmt->bind_param("i", $id);
}

$stmt->execute();
$res = $stmt->get_result();
$tut = $res && $res->num_rows > 0 ? $res->fetch_assoc() : null;

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
    
    // Construct dynamic strings for META tags falling back to algorithmic defaults if empty
    $get_dis = !empty($tut['seo_description']) ? htmlspecialchars($tut['seo_description']) : substr(strip_tags(html_entity_decode($tut['description'])), 0, 150);
    $get_key_words = !empty($tut['seo_keywords']) ? htmlspecialchars($tut['seo_keywords']) : "Chamika Herath, drawing tutorials, " . $tut['difficulty_level'];
    include_once './Meta_Tag/Meta_Tag.php'; 
    ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Homemade+Apple&family=Inter:wght@400;600&display=swap');

        body {
            background-color: #2b2520 !important;
            background-image: radial-gradient(circle at center, rgba(30,22,17,0) 0%, rgba(15,10,5,0.7) 100%),
                              url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)' opacity='0.08'/%3E%3C/svg%3E") !important;
        }

        .tutorial-content-body {
            color: #211c18;
            font-size: 17px;
            line-height: 1.8;
            word-wrap: break-word;
            font-family: 'Inter', sans-serif;
            
            /* Parchment Paper Colors & Texture */
            background-color: #eeddbb; /* Warm vintage beige */
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.6' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)' opacity='0.15'/%3E%3C/svg%3E");
            padding: 40px !important;
            
            /* Slightly uneven borders for realism */
            border-radius: 2px 4px 1px 3px !important;
            /* Deep soft shadow making it float off the page dynamically */
            box-shadow: 0 15px 35px rgba(0,0,0,0.6), -5px -5px 15px rgba(255,255,255,0.02) inset !important;
            position: relative;
        }
        
        .tutorial-content-body::after {
            content: '';
            position: absolute;
            bottom: -3px; left: 0; width: 100%; height: 5px;
            background: transparent;
            box-shadow: 0 10px 5px -5px rgba(0,0,0,0.4);
            pointer-events: none;
        }

        .tutorial-content-body img {
            max-width: 100%;
            height: auto;
            border-radius: 2px;
            margin: 20px 0;
            filter: sepia(0.3) grayscale(20%) contrast(1.15) brightness(0.9);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        /* Style Quill Lists & Structural nodes appropriately */
        .tutorial-content-body ul, .tutorial-content-body ol {
            margin-left: 20px;
            padding-left: 10px;
            color: #3b332b;
            margin-bottom: 25px;
        }
        .tutorial-content-body h2, .tutorial-content-body h3 {
            font-family: 'Playfair Display', serif;
            color: #33261c;
            margin-top: 30px;
            margin-bottom: 15px;
            font-weight: 700;
        }
        .tutorial-content-body a {
            color: #731919;
            text-decoration: underline;
        }
        .tutorial-video-wrapper {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 responsive aspect */
            padding-top: 25px;
            height: 0;
            margin-bottom: 40px;
            border-radius: 4px;
            overflow: hidden;
            border: 1px solid rgba(0,0,0,0.1);
            box-shadow: 0 5px 20px rgba(0,0,0,0.4);
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
        <a href="tutorials.php" style="font-family: 'Inter', sans-serif; color: #a48c77; text-decoration: none; font-size: 14px; display: inline-block; margin-bottom: 20px; transition: 0.3s;" onmouseover="this.style.color='#dbaf82'" onmouseout="this.style.color='#a48c77'">
            &#8592; Back to Library
        </a>
        
        <h1 style="font-family: 'Playfair Display', serif; font-size: 3.5rem; margin-bottom: 20px; color: #dbaf82; font-weight: 400; font-style: italic; line-height: 1.1; letter-spacing: 1px;">
            <?php echo htmlspecialchars($tut['title']); ?>
        </h1>
        
        <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 40px; color: #a48c77; font-size: 13px; font-family: 'Inter', sans-serif;">
            <span style="color: <?php echo ($diff == 'BEGINNER') ? '#8c5922' : (($diff == 'INTERMEDIATE') ? '#3c5a61' : '#731919'); ?>; font-weight: 800; background: rgba(0,0,0,0.3); padding: 5px 15px; border-radius: 5px; box-shadow: inset 0 0 10px rgba(0,0,0,0.5);">
                <?php echo $diff; ?> EDITION
            </span>
            <span>Published on <?php echo date("F j, Y", strtotime($tut['sdt'])); ?></span>
        </div>

        <!-- Content Payload Surface Area -->
        <div id="tutorial_book" class="tutorial-content-body">
            <!-- Inject Raw HTML Payload from Database entirely untouched to preserve Quill rich text structures perfectly -->
            <?php echo $tut['description']; ?>
        </div>
    </main>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var book = document.getElementById("tutorial_book");
        // We use Heading 2 tags (Top Level Headers) as natural Semantic Page Breaks!
        var headers = book.querySelectorAll("h2");
        
        if (headers.length > 0) { // If H2s exist, pagify it!
            var nodes = Array.from(book.childNodes);
            var pages = [];
            
            var currentPage = document.createElement("div");
            currentPage.className = "tut-page";
            
            nodes.forEach(node => {
                // When we hit an H2, we break the page (unless we are at the very beginning)
                if (node.tagName && node.tagName.toLowerCase() === 'h2') {
                    if (currentPage.textContent.trim() !== "" || currentPage.querySelectorAll('img').length > 0) {
                        pages.push(currentPage);
                        currentPage = document.createElement("div");
                        currentPage.className = "tut-page";
                    }
                }
                currentPage.appendChild(node);
            });
            // Push the last remaining elements
            if (currentPage.childNodes.length > 0) pages.push(currentPage);

            // If we actually created more than 1 page
            if(pages.length > 1) {
                book.innerHTML = "";
                
                // Create native UI paginator container
                var paginator = document.createElement("div");
                paginator.style.display = "flex";
                paginator.style.justifyContent = "space-between";
                paginator.style.marginTop = "60px";
                paginator.style.paddingTop = "25px";
                paginator.style.borderTop = "1px solid rgba(255,255,255,0.05)";
                
                var currentIndex = 0;
                
                function updatePaginator() {
                    pages.forEach((p, index) => {
                        p.style.display = (index === currentIndex) ? "block" : "none";
                        p.style.animation = (index === currentIndex) ? "fadeObj 0.5s ease" : "none";
                    });
                    
                    paginator.innerHTML = "";
                    var prevBtn = document.createElement("button");
                    prevBtn.innerHTML = "&#8592; Previous";
                    prevBtn.style.padding = "12px 25px";
                    prevBtn.style.borderRadius = "8px";
                    prevBtn.style.border = "1px solid var(--primary)";
                    prevBtn.style.background = "transparent";
                    prevBtn.style.color = "var(--primary)";
                    prevBtn.style.cursor = "pointer";
                    prevBtn.style.fontWeight = "700";
                    prevBtn.style.opacity = currentIndex > 0 ? "1" : "0.2";
                    prevBtn.style.pointerEvents = currentIndex > 0 ? "auto" : "none";
                    prevBtn.onclick = () => { if(currentIndex > 0) { currentIndex--; updatePaginator(); window.scrollTo({top: 100, behavior: 'smooth'}); } };
                    
                    var nextBtn = document.createElement("button");
                    nextBtn.innerHTML = "Next Page &#8594;";
                    nextBtn.style.padding = "12px 25px";
                    nextBtn.style.borderRadius = "8px";
                    nextBtn.style.border = "none";
                    nextBtn.style.background = "var(--primary)";
                    nextBtn.style.color = "#000";
                    nextBtn.style.fontWeight = "700";
                    nextBtn.style.cursor = "pointer";
                    nextBtn.style.opacity = currentIndex < pages.length - 1 ? "1" : "0.2";
                    nextBtn.style.pointerEvents = currentIndex < pages.length - 1 ? "auto" : "none";
                    nextBtn.onclick = () => { if(currentIndex < pages.length-1) { currentIndex++; updatePaginator(); window.scrollTo({top: 100, behavior: 'smooth'}); } };
                    
                    var counter = document.createElement("div");
                    counter.style.color = "var(--text-dim)";
                    counter.style.alignSelf = "center";
                    counter.style.fontSize = "14px";
                    counter.style.fontWeight = "600";
                    counter.innerHTML = "PAGE " + (currentIndex + 1) + " OF " + pages.length;

                    paginator.appendChild(prevBtn);
                    paginator.appendChild(counter);
                    paginator.appendChild(nextBtn);
                }

                pages.forEach(p => book.appendChild(p));
                book.appendChild(paginator);
                
                // Add fade animation CSS cleanly
                if(!document.getElementById("tutFadeAnim")) {
                    var style = document.createElement("style");
                    style.id = "tutFadeAnim";
                    style.innerHTML = "@keyframes fadeObj { from { opacity: 0; transform: translateY(15px); } to { opacity: 1; transform: translateY(0); } }";
                    document.head.appendChild(style);
                }
                
                updatePaginator();
            }
        }
    });
    </script>

    <?php include_once './UxUI-Back/Needs/footer.php'; ?>
</body>
</html>
