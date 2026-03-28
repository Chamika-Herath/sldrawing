<?php
// Proxy all requests to the root directory
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Mapping logic
if ($url === '/' || $url === '') {
    require __DIR__ . '/../index.php';
} else {
    $file = __DIR__ . '/..' . $url;
    
    // If it's a .php file or if appending .php makes it one, load it
    if (file_exists($file) && is_file($file) && str_ends_with($file, '.php')) {
        require $file;
    } elseif (file_exists($file . '.php')) {
        require $file . '.php';
    } else {
        // Fallback to index.php if not found (optional)
        require __DIR__ . '/../index.php';
    }
}
