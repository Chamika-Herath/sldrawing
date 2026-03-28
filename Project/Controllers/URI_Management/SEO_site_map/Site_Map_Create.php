<?php

class Site_Map_Create {

    private $base_url;        // Base URL of the website
    private $pages = [];      // Pages to include in the sitemap
    private $file_path;       // Path to save the sitemap file
    private $compnay_info_obj;

    // Constructor to initialize the base URL, pages, and file path
    public function __construct() {
        $this->compnay_info_obj = new Company_Info_Variable_List();
        $this->base_url = $this->compnay_info_obj->get_app_URL();
        $pth_data = isset($_SESSION['pth']) ? $_SESSION['pth'] : "";
        $this->file_path = $pth_data . "sitemap.xml";
    }

    // Function to add pages to the sitemap
    public function addPage($category, $page, $priority_count) {
        $this->pages[] = ['category' => $category, 'page' => $page, 'priority' => $priority_count];
    }

    // Function to generate the URL for each page
    private function generateUrl($category, $page) {
        if ($category == "0") {
            return $this->base_url . $page;
        } else {
            return $this->base_url . '/' . $category . $page;
        }
    }

    // Function to generate the sitemap XML content using DOMDocument
    private function generateSitemapXml() {
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = true;
        $urlset = $dom->createElement('urlset');
        $urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        foreach ($this->pages as $item) {
            $url = $this->generateUrl($item['category'], $item['page']);
            $urlElement = $dom->createElement('url');
            $loc = $dom->createElement('loc', htmlspecialchars($url));
            $urlElement->appendChild($loc);
            $lastmod = $dom->createElement('lastmod', date('Y-m-d'));
            $urlElement->appendChild($lastmod);
            $changefreq = $dom->createElement('changefreq', 'daily');
            $urlElement->appendChild($changefreq);
            $priority = $dom->createElement('priority', $item['priority']);
            $urlElement->appendChild($priority);
            $urlset->appendChild($urlElement);
        }
        $dom->appendChild($urlset);
        return $dom->saveXML();
    }

    public function saveSitemap() {
        $state_bool = false;
        $sitemap_content = $this->generateSitemapXml();
        if (file_put_contents($this->file_path, $sitemap_content) === false) {
            return 'Error: Unable to write sitemap to file. Please check file permissions.';
        } else {
            $state_bool = true;
        }

        return $state_bool;
    }

    public function outputSitemap() {
        echo $this->generateSitemapXml();
    }
}

?>
