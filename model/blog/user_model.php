<?php

class user_model extends ModelBase {

    public function getUsers() {
        return $this->db->selectMany("SELECT `user` FROM `v_blog` GROUP by `user`;", []);
    }

    public function getUserBlogs($user) {
        return $this->db->selectMany("SELECT * FROM `v_blog` WHERE `user` = :user;", ["user" => $user]);
    }

    public function getBlog($id) {
        return $this->db->selectOne("SELECT * FROM `v_blog` WHERE `id` = :id;", ["id" => $id]);
    }

    public function saveRecord($data) {
        if (isset($data["id"]) && $data["id"] > 0)
            return $this->update($data);
        else
            return $this->insert($data);
    }

    public function deleteRecord($id) {
        if ($id > 0) {
            $this->db->update("DELETE FROM `v_blog` WHERE `v_blog`.`id` = :id", [ "id" => $id ]);
            return true;
        }
        return false;
    }

    private function insert($data) {
        $user = $data["user"];
        $header = $data["header"];
        $text = $data["text"];

        if ($header == "" || $text == "" || $user == "")
            return false;

        $this->db->create("INSERT INTO `v_blog` (
            `user`, 
            `create_date`, 
            `update_date`, 
            `header`, 
            `text`) 
            VALUES 
                (:user, 
                CURRENT_TIMESTAMP, 
                CURRENT_TIMESTAMP, 
                :header, 
                :text);", 
                [
                    "user" => $user,
                    "header" => $header,
                    "text" => $text
                ]);
        return true;
    }

    private function update($data) {
        $user = $data["user"];
        $header = $data["header"];
        $text = $data["text"];
        $id = $data["id"];
        
        if ($header == "" || $text == "" || $user == "")
            return false;


        $this->db->update(
            "UPDATE `v_blog` 
                SET `user` = :user, 
                    `update_date` = CURRENT_TIMESTAMP, 
                    `header` = :header, 
                    `text` = :text 
                WHERE 
                    `v_blog`.`id` = :id", 
            [
                "user" => $user,
                "header" => $header,
                "text" => $text,
                "id" => $id
            ]);

        return true;
    }
}