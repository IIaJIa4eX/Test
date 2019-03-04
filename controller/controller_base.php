<?php

class ControllerBase {

    protected $controller;

    public function setController($value) {
        if (strpos($value, "admin_") !== false)
            $value = substr($value, 6);
        $this->controller = $value;
    }

    private $render;
    /**
     * @var DB $db
     */
    private $db = null;

    public $params;

    public function __construct()
    {
    }

    public function canAnonymus($action) {
        return true;
    }

    public function setRender($render) {
        $this->render = $render;
    }

    /**
     * @return render
     */
    protected function Render() {
        return $this->render;
    }

    /**
     * @return DB
     */
    protected function DB() {
        if ($this->db == null) {
            $this->db = app::Current()->getDB();
            $this->db->selectDB("db");
        }

        return $this->db;
    }

    public function exec($action) {
        if (!method_exists($this, $action)) {
            return $this->Render()->WriteError("Метода не существует");
        }

        if (!is_callable([$this, $action])) {
            return $this->Render()->WriteError("Метод не доступен");
        }

        return $this->$action();
    }

    /**
     * Переопределяя эти функции, мы влияем на 
     * отрисовку CSS файлов в заголовке сайта
     */
    public function getHeaderCSS() {
        return [
            "/css/bootstrap.css",
            "/css/main.css"
        ];
    }

    /**
     * Переопределяя эти функции, мы влияем на 
     * отрисовку JS файлов в заголовке сайта
     */
    public function getHeaderJS() {
        return [
            "/js/jquery-3.3.1.js",
            "/js/bootstrap.bundle.js"
        ];
    }

    /**
     * Переопределяя эти функции, мы влияем на 
     * отрисовку Layout'a сайта
     */
    public function getLayout() {
        return "index";
    }


    public function getModel($model, $controller = null) {
        if ($controller != null)
            return app::Current()->ModelClass($controller, $model);
        if ($this->controller == NULL)
            $this->setController(get_class($this));
        return app::Current()->ModelClass($this->controller, $model);
    }

    public function getFromIndex($from, $index, $defaultValue = "") {
        if (!isset($from[$index])) return $defaultValue;
        return $from[$index];
    }
}