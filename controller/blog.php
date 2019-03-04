<?php


class blog extends ControllerBase {

    /**
     * @var user_model $model
    */
    private $model;

    public function __construct()
    {
        $this->model = $this->getModel("user");
    }

    public function byName() {
        $name = $this->params["name"];

        $menu = $this->model->getUserBlogs($name);

        return $this->Render()->WriteHTML(
            [
                "items" => $menu,
            ],
            "blog", "block"
        );
    }

}