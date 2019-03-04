<?php

class menu_model extends ModelBase {

    public function getAllCats() {
        $all = $this->db->selectMany("SELECT * FROM `menu_category`", []);
        
        return $all;
    }
    public function getAllElements() {
        $all = $this->db->selectMany("SELECT * FROM `menu_item`", []);
        
        return $all;
    } 

    public function getElementsByCategory($id) {
        $elements = $this->db->selectMany("SELECT * FROM `menu_item` where category_id = :id", [ "id" => $id ]);
        
        return $elements;
    }

    public function getCategoryOrDefault($id) {
        $cat = $this->db->selectOne("SELECT * FROM `menu_category` where id = :id", ["id" => $id]);

        if ($cat !== false)
            return $cat;

        return [
            "id" => -1,
            "name" => "",
            "description" => ""
        ];
    }

    public function saveCat($category) {
        if (!isset($category["id"]) || $category["id"] == -1)
            $this->createCategory($category);
        else
            $this->updateCategory($category);
    }

    private function createCategory($category) {
        $this->db->create("INSERT 
                            INTO `menu_category` (`name`, `description`) 
                            VALUES (:name, :description)", [
                                "name" => $category["name"],
                                "description" => $category["description"],
                            ]);
    }

    private function updateCategory($category) {
        $this->db->create("UPDATE `menu_category` 
                            SET `name` = :name, 
                                `description` = :description 
                            WHERE `id` = :id", [
                                "name" => $category["name"],
                                "description" => $category["description"],
                                "id" => $category["id"],
                            ]);
    }

    public function deleteCat($id) {
        $this->db->update("DELETE FROM `menu_category` WHERE `id` = :id", ["id" => $id]);
    }


    public function getItemsByCat($category_name) {
        $all = $this->db->selectMany("
                SELECT * FROM `menu_item` 
                WHERE category_id = (SELECT id from `menu_category` WHERE `name` = :name)",
                [
                    "name" => $category_name,
                ]);

        return $all;
    }

    public function saveItem($item) {
        if (!isset($item["id"]) || $item["id"] == -1)
            $this->createItem($item);
        else
            $this->updateItem($item);
    }
    

    private function createItem($item) {
        //var_dump($item); exit();
        $this->db->create("
            INSERT INTO `menu_item` 
                (`category_id`, `name`, 
                    `url`, `description`, `parent_id`) 
            VALUES (
                :category_id, :name, 
                :url, :description, :parent_id)", [
            "category_id" => $item["category_id"],
            "name" => $item["name"],
            "url" => $item["url"],
            "description" => $item["description"],
            "parent_id" => $item["parent_id"]
        ]);
    }

    private function updateItem($item) {
        $this->db->update("
            UPDATE `menu_item` 
                SET 
                    `category_id` = :category_id, 
                    `name` = :name, 
                    `url` = :url, 
                    `description` = :description, 
                    `parent_id` = :parent_id
                WHERE `id` = :id", 
        [
            "category_id" => $item["category_id"],
            "name" => $item["name"],
            "url" => $item["url"],
            "description" => $item["description"],
            "parent_id" => $item["parent_id"],
            "id" => $item["id"]
        ]);
    }

    public function deleteItem($id) {
        $this->db->update("DELETE FROM `menu_item` WHERE `id` = :id", [ "id" => $id ]);
    }

    public function getItem($id) {
        $item = $this->db->selectOne("SELECT * FROM `menu_item` where `id` = :id", [ "id" => $id ]);
        

        if ($item !== false) {
           
            return $item;
        }

        $item = [
            "id" => -1,
            "name" => "",
            "description" => "",
            "category_id" => ""
        ];

        
        return $item;
    }
    public function getIdByNameCat($name) {
        $idName = $this->db->selectOne("SELECT * FROM `menu_category` where `name` = :name", [ "name" => $name ]);
         
        return $idName;
    }

    public function getAllTree($categoryName) {
        $all = $this->getItemsByCat($categoryName);

        $arr = $this->makeBlackMagic("-1", $all);
        return $arr;
    }

    private function makeBlackMagic($id, $arr) {
        $data = [];

        foreach ($arr as $v) {
            if ($v["parent_id"] == $id) {
                $tmp = $v;
                $tmp["subs"] = $this->makeBlackMagic($tmp["id"], $arr);
                $data[] = $tmp;
            }
        }

        return $data;
    }


}