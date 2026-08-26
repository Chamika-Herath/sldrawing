<?php
class sld_tutorials_ADD_UPDATE
{
    private $id = 0;
    private $title;
    private $description;
    private $difficulty_level;
    private $video_url = "";
    private $thumbnail_url = "";
    private $main_user_login_id;
    private $seo_keywords;
    private $seo_description;

    public function set_id($get_id) { $this->id = $get_id; }
    public function set_title($get_title) { $this->title = $get_title; }
    public function set_description($get_description) { $this->description = $get_description; }
    public function set_difficulty_level($get_difficulty_level) { $this->difficulty_level = $get_difficulty_level; }
    public function set_video_url($get_video_url) { $this->video_url = $get_video_url; }
    public function set_thumbnail_url($get_thumbnail_url) { $this->thumbnail_url = $get_thumbnail_url; }
    public function set_main_user_login_id($get_id) { $this->main_user_login_id = $get_id; }
    public function set_seo_keywords($get_seo_keywords) { $this->seo_keywords = $get_seo_keywords; }
    public function set_seo_description($get_seo_description) { $this->seo_description = $get_seo_description; }

    public function process_update()
    {
        $data_base_obj = new DataBase();
        $conn = $data_base_obj->get_data_base_connction();
        $state = false;

        if ($this->id == 0) {
            // Generate Organic SEO Slug dynamically on initial creation!
            $base_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->title), '-'));
            $final_slug = $base_slug;
            $counter = 1;
            while (true) {
                $check = $conn->prepare("SELECT id FROM sld_tutorials WHERE seo_slug = ?");
                $check->bind_param("s", $final_slug);
                $check->execute();
                if ($check->get_result()->num_rows > 0) {
                    $final_slug = $base_slug . '-' . $counter;
                    $counter++;
                } else {
                    break;
                }
            }

            $sql = "INSERT INTO sld_tutorials (title, seo_slug, description, difficulty_level, video_url, thumbnail_url, seo_keywords, seo_description, main_user_login_id, ast, sdt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 1, CURRENT_TIMESTAMP)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssssi", $this->title, $final_slug, $this->description, $this->difficulty_level, $this->video_url, $this->thumbnail_url, $this->seo_keywords, $this->seo_description, $this->main_user_login_id);
            if ($stmt->execute()) {
                $this->id = $stmt->insert_id;
                $state = true;
            }
        } else {
            $sql = "UPDATE sld_tutorials SET title=?, description=?, difficulty_level=?, video_url=?, thumbnail_url=?, seo_keywords=?, seo_description=?, main_user_login_id=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssii", $this->title, $this->description, $this->difficulty_level, $this->video_url, $this->thumbnail_url, $this->seo_keywords, $this->seo_description, $this->main_user_login_id, $this->id);
            if ($stmt->execute()) {
                $state = true;
            }
        }
        return $state;
    }
}
?>
