<?php

class admin extends ControllerBase {

    private $path;

    public function __construct()
    {
        $this->path = app::Current()->getRequest()->getPath();
    }

    public function getHeaderJS() {
        $data = parent::getHeaderJS();

        $data[] = "https://cdn.ckeditor.com/4.8.0/standard-all/ckeditor.js";

        return $data;
    }

    public function canAnonymus($action) {
        return false;
    }

    public function menu() {
        return $this->Render()->WriteHTML([
            [
                "href" => "/admin/statictext",
                "text" => "Текстовые блоки"
            ],
            [
                "href" => "/admin/blog",
                "text" => "Блоги пользователей"
            ],
            [
                "href" => "/admin/good",
                "text" => "Категории товаров"
            ],
            [
                "href" => "/admin/good/show_good_all",
                "text" => "Все товары"
            ],
            [
                "href" => "/admin/wmenu/all_cats",
                "text" => "Категории меню"
            ],
            [
                "href" => "/admin/article/all_cats",
                "text" => "Категории article"
            ]
        ], "shared", "menu");
    }

    public function index() {
        return $this->Render()->WriteHTML(
            [
                "component" => $this->Render()->drawRoute("statictext", "block", ["conf" => "static", "sec" => "AdminText"])
            ], 
            "admin", "module"); 
    }

    private function writeComponent() {
        if (count($this->path) < 2)
            return $this->index();

        $controller = "admin_" . $this->path[1];
        $action = isset($this->path[2]) ? $this->path[2] : "index";

        return $this->Render()->WriteHTML(
            [
                "component" => $this->Render()->drawRoute($controller, $action)
            ], 
            "admin", "module"); 
    }

    public function statictext() {
        return $this->writeComponent();
    }

    public function blog() {
        return $this->writeComponent();
    }

    public function good() {
        return $this->writeComponent();
    }

    public function wmenu() {
        return $this->writeComponent();
    }

    public function article() {
        return $this->writeComponent();
    }
}