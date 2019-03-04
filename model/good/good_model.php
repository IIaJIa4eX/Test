<?php

class good_model extends ModelBase {

    /**
     * Возвращает список категорий
     */
    public function getcategoryes() {
        return $this->db->selectMany("SELECT * FROM `good_category`", []);
    }

    public function getGoodAll() {
        return $this->db->selectMany("SELECT * FROM `good`", []);
    }

    public function getCategoryOrDefault($id) {
        $cat = $this->db->selectOne("SELECT * FROM `good_category` where id = :id", ["id" => $id]);

        if ($cat !== false)
            return $cat;

        return [
            "id" => -1,
            "name" => "",
            "description" => ""
        ];
    }

    public function getGood($id) {
        $good = $this->db->selectOne("SELECT * FROM `good` where `id` = :id", [ "id" => $id ]);
        

        if ($good !== false) {
            $good["params"] = $this->getParams($id);
            return $good;
        }

        $good = [
            "id" => -1,
            "name" => "",
            "description" => "",
            "category_id" => ""
        ];

        $good["params"] = [];

        

        return $good;
    }

    public function getGoodsByCategory($id) {
        $goods = $this->db->selectMany("SELECT * FROM `good` where category_id = :id", [ "id" => $id ]);
        $ids = [];
        foreach ($goods as $k => $value) {
            $goods[$k]["params"] = [];
            $ids[] = $value["id"];
        }

        $params = $this->getParams($ids);

        foreach ($params as $value) {
            foreach ($goods as $good_k => $good_v) {
                if ($good_v["id"] == $value["good_id"])
                    $goods[$good_k]["params"][] = $value;
                    //array_push($goods[$good_k]["params"], $value);
            }
        }

        return $goods;
    }

    public function getParams($idArr) {
        $sql = "SELECT * FROM `good_info` where `good_id` ";

        if (!is_array($idArr))
            $sql .= " = " . $idArr; //$sql = $sql . $idArr;
        else
            $sql .= " in (" . implode(", ", $idArr) . ")";

        return $this->db->selectMany($sql, []);
    }


    public function saveGood($good) {
      
        if (!isset($good["id"]) || $good["id"] == -1){
    
            return $this->insertGood($good);
        }
        else
            return $this->updateGood($good);
    }

    private function insertGood($good) {
     
        
        $id = $this->db->create("INSERT INTO `good` (`name`, `description`, `category_id`) VALUES (:name, :description, :category_id)", 
        [
            "name" => $good["name"],
            "description" => $good["description"],
            "category_id" => $good["category_id"]
        ]);
     
            

        if ($id !== false)
            if (isset($good["params"]) && is_array($good["params"]))
                $this->saveParams($id, $good["params"]);

        return $id;
    }

    private function updateGood($good) {
        $result = $this->db->update("UPDATE `good` 
                                        SET `name` = :name, 
                                            `description` = :description,
                                            `category_id` = :category_id
                                                WHERE 
                                            `good`.`id` = :id ",
                                            [
                                                "name" => $good["name"],
                                                "description" => $good["description"],
                                                "category_id" => $good["category_id"],
                                                "id" => $good["id"]
                                            ]);
        if ($result === false)
            return false;

        if (isset($good["params"]) && is_array($good["params"]))
            $this->saveParams($good["id"], $good["params"]);
        return $good["id"];
    }

    public function saveParams($id, $params) {
        $this->db->update("DELETE FROM `good_info` WHERE `good_id` = :id;", [ "id" => $id ]);
        foreach ($params["name"] as $k => $v)
            if($v != "")
                $this->db->create("INSERT INTO 
                            `good_info` (`good_id`, `name`, `value`) 
                                VALUES (:good_id, :name, :value)", 
                                [
                                    "good_id" => $id,
                                    "name" => $v,
                                    "value" => $params["value"][$k]
                                ]
                            );
    }

    public function saveCategory($category) {
        if (!isset($category["id"]) || $category["id"] == -1)
            return $this->insertCategory($category);
        else
            return $this->updateCategory($category);
    }

    private function insertCategory($category) {
        return $this->db->create("INSERT INTO `good_category` 
                                (`name`, `description`) 
                                VALUES (:name, :description)", [
                                    "name" => $category["name"],
                                    "description" => $category["description"]
                                ]);
    }

    private function updateCategory($category) {
        $id = $this->db->update("UPDATE `good_category` 
                                    SET `name` = :name, 
                                        `description` = :description WHERE 
                                        `good_category`.`id` = :id ", 
                                        [
                                            "name" => $category["name"],
                                            "description" => $category["description"],
                                            "id" => $category["id"]
                                        ]);

        if ($id === false)
            return false;
        return $category["id"];
    }
}