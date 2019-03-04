<?php

class comment extends ControllerBase {

    public function canAnonymus($action) {
        return true;
    }

    /**
     * @var comment_model $model
     */
    private $model;

    public function __construct()
    {
        $this->model = $this->getModel("comment");
    }

    public function one() {
        $comment = $this->model->One($this->params["module"], $this->params["id"]);
        return $this->Render()->WriteHTML(
            $comment, "comment", "one"
        );
    }
    public function all() {
        $comments = $this->model->All($this->params["module"], $this->params["id"]);
        return $this->Render()->WriteHTML(
            $comments, "comment", "all"
        );
    }

    public function add() {
        $parent = 0;
        if (isset($this->params["parent"]))
            $parent = $this->params["parent"];
            
        return $this->Render()->WriteHTML(
            [
                "module" => $this->params["module"], 
                "id"     => $this->params["id"],
                "parent" => $parent
            ], "comment", "add");
    }

    public function save() {
        $id = $this->model->Save(
            $_POST["module"],
            $_POST["ref_id"],
            $_POST["create_date"],
            $_POST["user"],
            $_POST["text"],
            $_POST["parent_id"]
        );

        $this->Render()->RedirectURL($_SERVER["HTTP_REFERER"] . "#comment_" . $id);
     
     }
   


}