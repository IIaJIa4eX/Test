<?php

class article extends ControllerBase {

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

    /**
     * Переопределяя эти функции, мы влияем на 
     * отрисовку Layout'a сайта
     */
    public function getLayout() {
        return "inner_left";
    }    

    public function byName() {
        $name = "";
        if (isset($this->params["name"]))
            $name = $this->params["name"];
        else
            $name = $this->path[2];
        
        $article = $this->model->getArticleByCatName($name);

        return $this->Render()->WriteHTML(
            [
                "articles" => $article,
            ],
            "article", "block"
        );
    }

    public function one() {
        if (!isset($this->path[2])) {
            return $this->Render()->Redirect("home", "index");
        }

        $id = $this->path[2];
        $data = $this->model->getArticle($id);

        return $this->Render()->WriteHTML($data, "article", "one");
    }

    public function CatList() {
        $cats = $this->model->getAllCats();

        return $this->Render()->WriteHTML($cats, "article", "cats");
    }

    public function SearchArticle(){
        return $this->Render()->WriteHTML(
            [
                "articles" => $this->model->SearchArticle($_POST["text"]), 
            ],
            
            "article", "block"
        );
    }



}