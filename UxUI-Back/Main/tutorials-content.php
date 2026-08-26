<?php
include_once './imports/need/DB.php';
include_once './Controllers/Main/sld_tutorials/sld_tutorials_LIST.php';
$tutorial_list = new sld_tutorials_LIST();
$res = $tutorial_list->custom_query("SELECT * FROM sld_tutorials WHERE ast = 1 ORDER BY sdt DESC");
?>
<!-- Tutorials Page Component -->
<main class="container section-padding">
    <div style="text-align: center; margin-bottom: 80px; margin-top: 100px;">
        <h1 style="font-size: 3.5rem; margin-bottom: 20px; color: var(--text);">Master the <span style="color: var(--primary);">Legacy</span></h1>
        <p style="color: var(--text-dim); max-width: 600px; margin: 0 auto;">Expert-led guides refined for the modern digital artist.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px;">
        <?php
        if ($res && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                // Determine the correct root URL for images natively relative to index
                $thumb = !empty($row['thumbnail_url']) ? str_replace("../../../", "./", $row['thumbnail_url']) : './assets/images/placeholder.webp'; 
                
                $diff = strtoupper($row['difficulty_level']);
                $color = ($diff == 'BEGINNER') ? '#a855f7' : (($diff == 'INTERMEDIATE') ? '#00f3ff' : 'var(--primary)');
                
                $desc = strip_tags(html_entity_decode($row['description']));
                if(strlen($desc) > 80) $desc = substr($desc, 0, 77) . '...';
        ?>
        <div class="glass" style="border-radius: 30px; overflow: hidden; transition: 0.3s; cursor: pointer; background: var(--surface);" onclick="window.location.href='tutorial_view.php?id=<?php echo $row['id']; ?>'" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 30px rgba(255, 77, 0, 0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
            <img src="<?php echo $thumb; ?>" style="width: 100%; height: 250px; object-fit: cover;">
            <div style="padding: 30px;">
                <h2 style="margin-bottom: 15px; color: var(--text); font-size: 24px; font-weight: 700;"><?php echo htmlspecialchars($row['title']); ?></h2>
                <p style="color: var(--text-dim); margin-bottom: 25px; line-height: 1.6; height: 50px; overflow:hidden;"><?php echo htmlspecialchars($desc); ?></p>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="color: <?php echo $color; ?>; font-weight: 700; font-size: 13px; letter-spacing: 1px;"><?php echo $diff; ?> GUIDE</span>
                    <button class="btn" style="padding: 10px 20px; background: rgba(0,0,0,0.2); border: 1px solid <?php echo $color; ?>; color: <?php echo $color; ?>; border-radius: 5px; font-weight: 700;">Start Learning</button>
                </div>
            </div>
        </div>
        <?php
            }
        } else {
            echo "<p style='color: var(--text-dim); text-align: center; grid-column: 1/-1; padding: 40px;'>More tutorials coming soon. The archives are currently empty.</p>";
        }
        ?>
    </div>
</main>
