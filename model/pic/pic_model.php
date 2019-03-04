<?php

class pic_model extends ModelBase {
    
    public function All($module, $id) {
        $model = $this->db->selectMany("SELECT * FROM `pic` WHERE `module` = :module AND `ref_id` = :id", [
            "module" => $module,
            "id" => $id
        ]);

        if ($model === false)
            return [];
        return $model;
    }

    public function One($module, $id) {
        $data = $this->All($module, $id);
        if (count($data) == 0) {
            return [
                "id"        => -1,
                "module"    => $module,
                "ref_id"    => $id,
                "name"      => "nopic",
                "link"      => "/img/nopic.jpg",
                "cat"       => "nopic"
            ];
        }
        return $data[0];
    }

    public function Save($module, $id, $name, $cat = "") {
        $file = $_FILES["file"];
        $storename = uniqid() . substr($file["name"], -4);

        move_uploaded_file(
            $file["tmp_name"], 
            dirname(__FILE__) . "/../../img/" . $storename
        );

        $this->db->create(
            "INSERT INTO `pic` 
                (`module`, `ref_id`, `name`, `link`, `cat`) 
            VALUES (:module, :ref_id, :name, :link, :cat) ", 
            
            [
                "module"    => $module,
                "ref_id"    => $id,
                "name"      => $name,
                "link"      => "/img/" . $storename,
                "cat"       => $cat
            ]);
    }

}