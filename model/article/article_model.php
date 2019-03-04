<?php

class article_model extends ModelBase {

    public function getAllCats() {
        $all = $this->db->selectMany("SELECT * FROM `article_category`", []);
        return $this->MakeBlackMagic("-1", $all);
    }

    private function MakeBlackMagic($id, $arr) {
        $tmp = [];

        foreach ($arr as $v) {
            if ($v["parent_id"] == $id) {
                $el = $v;
                $el["subs"] = $this->MakeBlackMagic($v["id"], $arr);
                $tmp[] = $el;
            }
        }

        return $tmp;
    }

    public function getCategoryOrDefault($id) {
        $cat = $this->db->selectOne("SELECT * FROM `article_category` where id = :id", ["id" => $id]);
        if ($cat !== false)
            return $cat;
        return [
            "id" => -1,
            "name" => "",
            "description" => "",
            "url" => "",
            "parent_id" => -1
        ];
    }

    public function getIdByNameCat($name) {
        $idName = $this->db->selectOne("SELECT * FROM `article_category` where `name` = :name", [ "name" => urldecode($name) ]);
       
        return $idName;
    }

    public function saveCat($category) {
        if (!isset($category["id"]) || $category["id"] == -1)
            $this->createCategory($category);
        else
            $this->updateCategory($category);
    }

    private function createCategory($category) {
        $this->db->create("INSERT INTO `article_category` (`name`, `description`, `url`, `parent_id`) 
                           VALUES (:name, :description, :url, :parent_id)", [
                                "name" => $category["name"],
                                "description" => $category["description"],
                                "url" => $category["url"],
                                "parent_id" => $category["parent_id"],
                            ]);
    }

    private function updateCategory($category) {
        $this->db->create("UPDATE `article_category` 
                            SET `name` = :name, 
                                `description` = :description,
                                `url` = :url,
                                `parent_id` = :parent_id
                            WHERE `id` = :id", [
                                "name" => $category["name"],
                                "description" => $category["description"],
                                "url" => $category["url"],
                                "parent_id" => $category["parent_id"],
                                "id" => $category["id"],
                            ]);
    }

    public function deleteCat($id) {
        $this->db->update("DELETE FROM `article_category` WHERE `id` = :id", ["id" => $id]);
    }


    public function getArticleByCatName($catName) {
        $all = $this->db->selectMany("
                SELECT * FROM `article` 
                    WHERE `id` = 
                        (SELECT `id` 
                            from `article_category` 
                        WHERE `url` = :url limit 1)",
                [
                    "url" => $catName,
                ]);

        return $all;
    }

    public function getArticleByCat($category_id) {
        $all = $this->db->selectMany("
                SELECT * FROM `article` 
                WHERE  `category_id` = :category_id",
                [
                    "category_id" => $category_id,
                ]);

        return $all;
    }
    public function getAllArticle() {
        $all = $this->db->selectMany("SELECT * FROM `article`", []);

        return $all;
    }

    public function saveArticle($article) {
        if (!isset($article["id"]) || $article["id"] == -1)
            $this->createArticle($article);
        else
            $this->updateArticle($article);
    }
    

    private function createArticle($article) {
       
        $this->db->create("INSERT INTO `article` 
                   (`category_id`, `name`, `create_date`, `update_date`, `short_text`, `text`) 
                   VALUES (:category_id, :name, CURRENT_TIMESTAMP, NOW(), :short_text, :text)", [
            "category_id" => $article["category_id"],
            "name" => $article["name"],
            "short_text" => $article["short_text"],
            "text" => $article["text"]
        ]);
    }

    private function updateArticle($article) {
        $this->db->update("UPDATE `article` 
                SET 
                    `category_id` = :category_id, 
                    `name` = :name, 
                    `update_date` = CURRENT_TIMESTAMP, 
                    `short_text` = :short_text, 
                    `text` = :text 
                WHERE `id` = :id", 
        [
            "category_id" => $article["category_id"],
            "name" => $article["name"],
            "short_text" => $article["short_text"],
            "text" => $article["text"],
            "id" => $article["id"]
        ]);
    }

    public function deleteArticle($id) {
        $this->db->update("DELETE FROM `article` WHERE `id` = :id", [ "id" => $id ]);
    }

    public function getArticle($id) {
        $article = $this->db->selectOne("SELECT * FROM `article` where `id` = :id", [ "id" => $id ]);
        

        if ($article !== false) {
           
            return $article;
        }

        $article = [
            "id" => -1,
            "name" => "",
            `create_date` => "CURRENT_TIMESTAMP", 
            `update_date` => "CURRENT_TIMESTAMP", 
            "short_text" => "",
            "text" => ""
        ];

        
        return $article;
    }


    public function SearchArticle($data){
  
        $arctiles = $this->db->selectMany("SELECT * FROM `article` where `text` like :text", [ "text" => "%" . $data . "%" ]);

        return $arctiles;
    }

}