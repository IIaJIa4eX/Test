<?php

class comment_model extends ModelBase {

    public function makeBlackMagic($realArray, $parentID) {
        $data = [];
        foreach($realArray as $value) {
            if ($value["parent_id"] == $parentID) {
                $value["subs"] = $this->makeBlackMagic($realArray, $value["id"]);
                $data[] = $value;
            }
        }

        return $data;
    }
    
    public function All($module, $id) {
        $model = $this->db->selectMany("SELECT * FROM `comment` WHERE `module` = :module AND `ref_id` = :id", [
            "module" => $module,
            "id" => $id
        ]);

        if ($model === false)
            return [];

        $data = $this->makeBlackMagic($model, "0");
        
        return $data;
    }
    public function Save($module, $id, $createDate, $user, $text, $parentId) {
        
        return $this->db->create("INSERT INTO `comment` (`module`, `ref_id`, `create_date`, `user`, `text`, `parent_id`) 
                          VALUES (:module, :ref_id, NOW(), :user, :text, :parent_id)" , 
            
            [
                "module"         => $module,
                "ref_id"         => $id,
                "user"           => $user,
                "text"           => $text,
                "parent_id"      => $parentId
            ]);
    }



}