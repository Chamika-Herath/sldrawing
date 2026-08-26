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
        <div id="tutorial_book" class="tutorial-content-body glass" style="padding: 40px; border-radius: 20px; background: var(--surface);">
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
