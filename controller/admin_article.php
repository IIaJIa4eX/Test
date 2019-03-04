<?php

class admin_article extends ControllerBase {

    public function canAnonymus($action) {
        return false;
    }

    /**
     * @var article_model $model
     */
    private $model;
    private $path;

    public function __construct()
    {
        $this->path  = app::Current()->getRequest()->getPath();
       
        $this->model = $this->getModel("article");
    }

    public function all_cats() {
        return $this->Render()->WriteHTML(
            [ 
                "elements" => $this->model->getAllCats(),
                "parent" => "-1"
            ],
            "article/admin",
            "all_cats"
        );
    }

    public function edit_cat() {
        $id = $this->getFromIndex($this->path, 3, -1);

        $cat = $this->model->getCategoryOrDefault($id);
        if ($_GET["parent_id"]) {
            $cat["parent_id"] = $_GET["parent_id"];
        }

        return $this->Render()->WriteHTML(
            $cat,
            "article/admin", "edit_cat"
        );
    }
    
    public function save_cat() {
        if (isset($_POST["name"]))
            $this->model->saveCat($_POST);

        return $this->all_cats();
    }

    public function edit_article() {
        $id = $this->getFromIndex($this->path, 3, -1);
        $model = $this->model->getArticle($id);
        $model["cats"] = $this->model->getAllCats();

        if (isset($_GET["cat"])) {
            $model["category_id"] = $this->model->getIdByNameCat($_GET["cat"]);
            $model["category_id"] = $model["category_id"]["id"];
        }
       
        return $this->Render()->WriteHTML(
            $model , 
            "article/admin", "edit_article"
        );
    }

    public function save_article() {
        if (isset($_POST["name"]))
            $this->model->saveArticle($_POST);
        return $this->all_cats();
    }

    public function show_articles() {

        $nameCat = $this->getFromIndex($this->path, 3, -1);
        if ($nameCat == -1) {
            return $this->all_cats();
        }

       $idCat = $this->model->getIdByNameCat($nameCat);
      
       $data = $this->model->getArticleByCat($idCat["id"]);

       return $this->Render()->WriteHTML(
           [
               "articles" => $data,
               "cat" => $nameCat
            ] , 
           "article/admin", "show_articles"
       );
      
    }
    public function show_one_article() {

       $nameCat = $this->getFromIndex($this->path, 3, -1);
       if ($nameCat == -1) {
           return $this->all_cats();
       }

       //var_dump($id); exit();
       // $data = $this->model->getAllTree($id);
      // $data = $this->model->getArticleByCat($id);
     //  $idCat = $this->model->getIdByNameCat($nameCat);
      
       $data = $this->model->getArticle($nameCat);
    //    var_dump($data); exit();
       return $this->Render()->WriteHTML(
           [
               "article" => $data,
               "cat" => $nameCat
            ] , 
           "article/admin", "show_one_article"
       );
      
    }
    public function index () {
       return $this->all_cats();
    }

    public function view () {
        if (!isset($this->path[3]))
            return $this->index();

        return $this->Render()->WriteHTML(
            $this->model->getUserBlogs($this->path[3]),
            "blog/admin", "blogs"
        );
    }

    


}