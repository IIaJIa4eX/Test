<?php

class pic extends ControllerBase {

    /**
     * @var DB $db
     */
    private $db;

    public function __construct()
    {
        $this->db = app::Current()->getDB();
    }

    private function getAll($module, $id) {
        return $this->db->selectMany("SELECT * FROM `pic` WHERE `module` = :module AND `ref_id` = :id", [
            "module" => $module,
            "id" => $id
        ]);
    }

    private function savePic($module, $id) {
        $file = $_FILES["file"];
        $storename = uniqid() . substr($file["name"], -4);


        move_uploaded_file(
            $file["tmp_name"], 
            dirname(__FILE__) . "/../img/" . $storename
        );

        $this->db->create(
            "INSERT INTO `pic` 
                (`module`, `ref_id`, `name`, `link`, `cat`) 
            VALUES (:module, :ref_id, :name, :link, :cat) ", 
            
            [
                "module" => $module,
                "ref_id" => $id,
                "name" => $_POST["pic_name"],
                "link" => "/img/" . $storename,
                "cat" => $_POST["pic_cat"]
            ]);
    }

    public function edit() {
        if (!isset($this->params["module"]))
            $this->params["module"] = "undefined";
        if (!isset($this->params["id"]))
            $this->params["id"] = 0;

        if (isset($_POST["action"]) && $_POST["action"] == "pic_add") {
            $this->savePic($this->params["module"], $this->params["id"]);
        }

        $arr = $this->getAll($this->params["module"], $this->params["id"]);

        return $this->Render()->WriteHTML([
            "pics" => $arr,
        ], "pic", "edit");
    }

    public function getPic() {
        if (
            !isset($this->params["id"]) ||
            !isset($this->params["module"])
            ) {
                return $this->Render()->WriteError("Картинка не найдена");
            }

        $pic = $this->db->selectOne(
            "SELECT * FROM `pic` WHERE module = :module AND ref_id = :id", 
            [
                "id"     => $this->params["id"],
                "module" => $this->params["module"]
            ]
        );

        if ($pic === false)
            return $this->Render()->WriteHTML("", "pic", "nopic");
        return $this->Render()->WriteHTML($pic, "pic", "pic");
    }


    public function getPicAllByGood() {
        if (
            !isset($this->params["id"]) ||
            !isset($this->params["module"])
            ) {
                return $this->Render()->WriteError("Картинка не найдена");
            }

        $pics = $this->db->selectMany(
            "SELECT * FROM `pic` WHERE module = :module AND ref_id = :id", 
            [
                "id"     => $this->params["id"],
                "module" => $this->params["module"]
            ]
        );

        if ($pics === false)
            return $this->Render()->WriteHTML("", "pic", "nopic");
        return $this->Render()->WriteHTML($pics, "pic", "pics");
    }
}