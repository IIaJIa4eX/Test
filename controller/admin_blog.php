<?php

class admin_blog extends ControllerBase {

    /**
     * @var user_model $model
     */
    private $model;

    private $path;

    public function __construct()
    {
        $this->model = $this->getModel("user");
        $this->path  = app::Current()->getRequest()->getPath();
    }

    public function canAnonymus($action) {
        return false;
    }


    public function index () {
        $arr = [];

        foreach ($this->model->getUsers() as $user) {
            $tmp = [
                "href" => "/admin/blog/view/" . $user["user"],
                "text" => $user["user"]
            ];

            $arr[] = $tmp;
        }

        return $this->Render()->WriteHTML($arr, "shared", "menu");
    }

    public function view () {
        if (!isset($this->path[3]))
            return $this->index();

        return $this->Render()->WriteHTML(
            $this->model->getUserBlogs($this->path[3]),
            "blog/admin", "blogs"
        );
    }

    public function edit () {
        if (!isset($this->path[3]))
            return $this->index();

        return $this->Render()->WriteHTML(
            $this->model->getBlog($this->path[3]),
            "blog/admin", "edit"
        );
    }

    public function save() {
        $this->model->saveRecord($_POST);
        return $this->index();
    }


}