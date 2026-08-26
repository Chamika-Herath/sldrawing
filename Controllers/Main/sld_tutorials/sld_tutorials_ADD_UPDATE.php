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

    public function set_id($get_id) { $this->id = $get_id; }
    public function set_title($get_title) { $this->title = $get_title; }
    public function set_description($get_description) { $this->description = $get_description; }
    public function set_difficulty_level($get_difficulty_level) { $this->difficulty_level = $get_difficulty_level; }
    public function set_video_url($get_video_url) { $this->video_url = $get_video_url; }
    public function set_thumbnail_url($get_thumbnail_url) { $this->thumbnail_url = $get_thumbnail_url; }
    public function set_main_user_login_id($get_id) { $this->main_user_login_id = $get_id; }

    public function process_update()
    {
        $data_base_obj = new DataBase();
        $conn = $data_base_obj->get_data_base_connction();
        $state = false;

        if ($this->id == 0) {
            $stmt = $conn->prepare("INSERT INTO sld_tutorials (title, description, difficulty_level, video_url, thumbnail_url, main_user_login_id, ast, sdt) VALUES (?, ?, ?, ?, ?, ?, 1, CURRENT_TIMESTAMP)");
            $stmt->bind_param("sssssi", $this->title, $this->description, $this->difficulty_level, $this->video_url, $this->thumbnail_url, $this->main_user_login_id);
            if ($stmt->execute()) {
                $this->id = $stmt->insert_id;
                $state = true;
            }
        } else {
            $stmt = $conn->prepare("UPDATE sld_tutorials SET title=?, description=?, difficulty_level=?, video_url=?, thumbnail_url=?, main_user_login_id=? WHERE id=?");
            $stmt->bind_param("sssssii", $this->title, $this->description, $this->difficulty_level, $this->video_url, $this->thumbnail_url, $this->main_user_login_id, $this->id);
            if ($stmt->execute()) {
                $state = true;
            }
        }
        return $state;
    }
}
?>
