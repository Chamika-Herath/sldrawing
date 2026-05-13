<?php

// 1. Detect Protocol and Domain
if (PHP_SAPI === 'cli') {
    $protocol = "https";
    $domain   = "drawing.heraforce.com";
} else {
    $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
    $domain   = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : "drawing.heraforce.com";
}
$baseUrl  = $protocol . "://" . $domain;

// 2. Define the output file path
// CHANGED: Moves up two directories from the current script location
$filePath = __DIR__ . '/../../../../sitemap.xml';

// 3. Initialize the XML string
$xmlContent  = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
$xmlContent .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

// --- START ADDING URLS ---

$pages = [
    '' => ['prio' => '1.0', 'freq' => 'daily'],
    'ai-grader.php' => ['prio' => '0.9', 'freq' => 'weekly'],
    'tutorials.php' => ['prio' => '0.8', 'freq' => 'weekly'],
    'studio.php' => ['prio' => '0.8', 'freq' => 'weekly'],
    'gallery.php' => ['prio' => '0.7', 'freq' => 'daily'],
    'challenges.php' => ['prio' => '0.7', 'freq' => 'daily'],
];

foreach ($pages as $page => $meta) {
    $xmlContent .= '  <url>' . PHP_EOL;
    $xmlContent .= '    <loc>' . $baseUrl . '/' . $page . '</loc>' . PHP_EOL;
    $xmlContent .= '    <lastmod>' . date('Y-m-d') . '</lastmod>' . PHP_EOL;
    $xmlContent .= '    <changefreq>' . $meta['freq'] . '</changefreq>' . PHP_EOL;
    $xmlContent .= '    <priority>' . $meta['prio'] . '</priority>' . PHP_EOL;
    $xmlContent .= '  </url>' . PHP_EOL;
}

// --- END ADDING URLS ---

// 4. Close the XML tag
$xmlContent .= '</urlset>';

// 5. Write the file
try {
    // Check if the directory exists first
    $directory = dirname($filePath);
    
    // We use realpath() here to check if the folder actually exists, 
    // because ../../ is a relative path.
    if (!is_dir($directory) && !realpath($directory)) {
        throw new Exception("Target directory does not exist or is not reachable: $directory");
    }

    // Attempt to write the file
    if (file_put_contents($filePath, $xmlContent)) {
        // Display the absolute path so you can verify where it landed
        echo "✅ Success! Sitemap generated at: " . realpath($filePath);
        echo "<br>URL: <a href='$baseUrl/sitemap.xml'>$baseUrl/sitemap.xml</a> (assuming standard path)";
    } else {
        echo "❌ Error: Could not write to '$filePath'. Please check folder permissions.";
    }
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage();
}

?>