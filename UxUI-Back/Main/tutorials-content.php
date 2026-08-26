<?php
include_once './imports/need/DB.php';
include_once './Controllers/Main/sld_tutorials/sld_tutorials_LIST.php';
$tutorial_list = new sld_tutorials_LIST();
$res = $tutorial_list->custom_query("SELECT * FROM sld_tutorials WHERE ast = 1 ORDER BY sdt DESC");
?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Homemade+Apple&family=Inter:wght@400;600&display=swap');

/* Global Override for this page to create the dark studio backdrop */
body {
    background-color: #2b2520 !important;
    background-image: radial-gradient(circle at center, rgba(30,22,17,0) 0%, rgba(15,10,5,0.7) 100%),
                      url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)' opacity='0.08'/%3E%3C/svg%3E") !important;
}

/* Classic Art Gallery Masonry Frame Definitions */
.atelier-grid {
    column-count: 2;
    column-gap: 50px;
    padding-bottom: 80px;
}
@media (max-width: 900px) { .atelier-grid { column-count: 1; } }

.atelier-card {
    break-inside: avoid;
    margin-bottom: 50px;
    /* Parchment Paper Colors & Texture */
    background-color: #eeddbb; /* Warm vintage beige */
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.6' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)' opacity='0.15'/%3E%3C/svg%3E");
    padding: 15px 15px 5px 15px;
    
    /* Slightly uneven borders for realism */
    border-radius: 2px 4px 1px 3px;
    /* Deep soft shadow making it float off the page dynamically */
    box-shadow: 0 15px 35px rgba(0,0,0,0.6), -5px -5px 15px rgba(255,255,255,0.02) inset;
    
    transition: 0.5s cubic-bezier(0.2, 0.8, 0.2, 1);
    position: relative;
    cursor: pointer;
}

/* Simulated torn / rough edge shadow using a subtle pseudo element */
.atelier-card::after {
    content: '';
    position: absolute;
    bottom: -3px; left: 0; width: 100%; height: 5px;
    background: transparent;
    box-shadow: 0 10px 5px -5px rgba(0,0,0,0.4);
    pointer-events: none;
}

.atelier-card:hover {
    transform: translateY(-8px) rotate(-1deg);
    box-shadow: 0 25px 50px rgba(0,0,0,0.9), -5px -5px 15px rgba(255,255,255,0.05) inset;
}

.atelier-img {
    width: 100%;
    max-height: 450px;
    object-fit: cover;
    border-radius: 1px;
    /* Simulate lead pencil / charcoal rendering dynamically over the image */
    filter: sepia(0.3) grayscale(20%) contrast(1.15) brightness(0.9);
    transition: 0.8s cubic-bezier(0.2, 0.8, 0.2, 1);
}
.atelier-card:hover .atelier-img {
    filter: sepia(0) grayscale(0%) contrast(1.1) brightness(1);
    transform: scale(1.02);
}

.atelier-header {
    font-family: 'Playfair Display', serif;
    font-size: 26px;
    color: #211c18;
    margin: 25px 0 15px 0;
    line-height: 1.25;
    letter-spacing: 0.5px;
    font-weight: 700;
}
.atelier-desc {
    font-family: 'Inter', sans-serif;
    color: #3b332b;
    font-size: 14px;
    line-height: 1.7;
    margin-bottom: 25px;
}

.atelier-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid rgba(0,0,0,0.15);
    padding-top: 20px;
    padding-bottom: 15px;
}
.atelier-level {
    font-family: 'Inter', sans-serif;
    font-size: 10px;
    letter-spacing: 3px;
    text-transform: uppercase;
    font-weight: 800;
    color: #554433; /* Default dark tone, overridden below securely */
}

/* Background Script Cursive */
.bg-cursive {
    font-family: 'Homemade Apple', cursive;
    position: absolute;
    color: rgba(255, 255, 255, 0.2);
    font-size: 32px;
    pointer-events: none;
    z-index: 0;
    transform: rotate(-10deg);
}

</style>

<!-- Tutorials Page Component -->
<main class="container section-padding" style="position: relative;">
    
    <!-- Decorative Sketched Calligraphy Background Accents -->
    <div class="bg-cursive" style="top: 260px; right: 10%;">A masterful stroke of charcoal...</div>
    <div class="bg-cursive" style="top: 750px; left: -5%; font-size: 40px; transform: rotate(-15deg); opacity: 0.15;">The digital canvas awaits.</div>
    <div class="bg-cursive" style="bottom: 150px; right: 20%; font-size: 28px; transform: rotate(5deg);">Study the grid lines closely.</div>

    <div style="text-align: center; margin-bottom: 90px; margin-top: 100px; position: relative; z-index: 5;">
        <h1 style="font-family: 'Playfair Display', serif; font-size: 5rem; margin-bottom: 5px; color: #dbaf82; font-weight: 400; font-style: italic; letter-spacing: 1px;">
            The Master's Atelier
        </h1>
        <p style="font-family: 'Homemade Apple', cursive; color: #a48c77; margin: 0 auto; font-size: 28px; transform: translateY(-10px) rotate(-2deg);">
            Curated archives refined for the modern digital artist.
        </p>
        <div style="width: 1px; height: 60px; background: rgba(219, 175, 130, 0.3); margin: 40px auto 0 auto;"></div>
    </div>

    <div class="atelier-grid" style="position: relative; z-index: 5;">
        <?php
        if ($res && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $thumb = !empty($row['thumbnail_url']) ? str_replace("../../../", "./", $row['thumbnail_url']) : './assets/images/placeholder.webp'; 
                
                $diff = strtoupper($row['difficulty_level']);
                // Use warmer tones for the parchment background natively
                $color = ($diff == 'BEGINNER') ? '#8c5922' : (($diff == 'INTERMEDIATE') ? '#3c5a61' : '#731919');
                
                $desc = strip_tags(html_entity_decode($row['description']));
                if(strlen($desc) > 130) $desc = substr($desc, 0, 127) . '...';
                
                $route = !empty($row['seo_slug']) ? 'tutorial_view.php?tutorial=' . htmlspecialchars($row['seo_slug']) : 'tutorial_view.php?id=' . $row['id']; 
        ?>
        <div class="atelier-card" onclick="window.location.href='<?php echo $route; ?>'">
            <div style="overflow:hidden;"><img src="<?php echo $thumb; ?>" class="atelier-img"></div>
            <div>
                <h2 class="atelier-header"><?php echo htmlspecialchars($row['title']); ?></h2>
                <p class="atelier-desc"><?php echo htmlspecialchars($desc); ?></p>
                <div class="atelier-meta">
                    <span class="atelier-level" style="color: <?php echo $color; ?>;"><?php echo $diff; ?> EDITION</span>
                    <span style="color: #211c18; font-family: serif; font-style: italic; opacity: 0.6;">➔</span>
                </div>
            </div>
        </div>
        <?php
            }
        } else {
            echo "<p style='color: var(--text-dim); font-family: Playfair Display, serif; font-style: italic; font-size: 20px; text-align: center; grid-column: 1/-1; padding: 40px;'>The exhibition is currently being prepared...</p>";
        }
        ?>
    </div>
</main>
