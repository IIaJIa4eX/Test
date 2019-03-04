<?php

class pic extends ControllerBase {

    public function canAnonymus($action) {
        return true;
    }

    /**
     * @var pic_model $model
     */
    private $model;

    public function __construct()
    {
        $this->model = $this->getModel("pic");
    }

    public function one() {
        $pic = $this->model->One($this->params["module"], $this->params["id"]);
        return $this->Render()->WriteHTML(
            $pic, "pic", "one"
        );
    }

    public function all() {
        $pics = $this->model->All($this->params["module"], $this->params["id"]);
        return $this->Render()->WriteHTML(
            $pics, "pic", "all"
        );
    }

    public function add() {
        return $this->Render()->WriteHTML(
            [
                "module" => $this->params["module"], 
                "id"     => $this->params["id"]
            ], "pic", "add");
    }

    public function save() {
        $this->model->Save(
            $_POST["module"],
            $_POST["ref_id"],
            $_POST["name"],
            $_POST["cat"]
        );

        $this->Render()->RedirectURL($_SERVER["HTTP_REFERER"]);
    }
}