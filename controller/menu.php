<?php

class menu extends ControllerBase {

    /**
     * @var menu_model $model
     */
    private $model;

    public function __construct()
    {
        $this->model = $this->getModel("menu", "wmenu");
    }

    public function byName() {
        $name = $this->params["name"];

        $menu = $this->model->getAllTree($name);

        return $this->Render()->WriteHTML(
            [
                "items" => $menu,
                "class" => "clear"
            ],
            "menu", "block"
        );
    }

}