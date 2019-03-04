<?php

class admin_wmenu extends ControllerBase {
    /**
     * @var config $conf
     */
    private $conf;
    private $path;

    /**
     * @var menu_model $model
     */
    private $model;

    public function __construct()
    {
        $this->conf = app::Current()->getConfig();
        $this->path = app::Current()->getRequest()->getPath();
        $this->model = $this->getModel("menu");
        //var_dump($this->model); exit();
    }
    
    public function canAnonymus($action) {
        return false;
    }


    public function all_cats() {
        return $this->Render()->WriteHTML(
            $this->model->getAllCats(),
            "menu/admin",
            "all_cats"
        );
    }

    public function edit_cat() {
        $id = $this->getFromIndex($this->path, 3, -1);
        return $this->Render()->WriteHTML(
            $this->model->getCategoryOrDefault($id), 
            "menu/admin", "edit_cat"
        );
    }
    public function save_cat() {
        $this->model->saveCat($_POST);
        return $this->Render()->WriteHTML(
            $this->model->getAllCats(),
            "menu/admin",
            "all_cats"
        );
    }

    public function edit_item() {
        $id = $this->getFromIndex($this->path, 3, -1);
        $model = $this->model->getItem($id);
        $model["cats"] = $this->model->getAllCats();

        if (isset($_GET["cat"])) {
            $model["category_id"] = $this->model->getIdByNameCat($_GET["cat"]);
            $model["category_id"] = $model["category_id"]["id"];
        }
        if (isset($_GET["par_id"]))
            $model["parent_id"] = $_GET["par_id"];
        else
            $model["parent_id"] = -1;

        return $this->Render()->WriteHTML(
            $model , 
            "menu/admin", "edit_item"
        );
    }

    public function save_item() {
        $this->model->saveItem($_POST);
        return $this->Render()->WriteHTML(
            $this->model->getAllCats(),
            "menu/admin",
            "all_cats"
        );
    }

    public function show_items() {

        $id = $this->getFromIndex($this->path, 3, -1);
        if ($id == -1) {
            return $this->all_cats();
        }

        //$idName = $this->model->getIdByNameCat($id);
        // var_dump($idName); exit();

        $data = $this->model->getAllTree($id);
       return $this->Render()->WriteHTML(
           [
               "items" => $data,//$this->model->getItemsByCat($id),
               "cat" => $id
            ] , 
           "menu/admin", "show_items"
       );

        // $data = $this->model->getAllTree($id);
    }

}