<?php

class admin_statictext extends ControllerBase {

    /**
     * @var config $conf
     */
    private $conf;

    private $path;

    public function __construct()
    {
        $this->conf = app::Current()->getConfig();
        $this->path = app::Current()->getRequest()->getPath();
    }
    
    public function canAnonymus($action) {
        return false;
    }


    public function index() {

        $this->conf->load("static");

        return $this->Render()->WriteHTML($this->conf->getAll(), "statictext/admin", "index");
    }

    public function edit() {
        $key = "";
        if (isset($this->path[3]))
            $key = $this->path[3];

        $this->conf->load("static");

        return $this->Render()->WriteHTML([
            "key" => $key,
            "value" => $this->conf->get($key)
        ], "statictext/admin", "edit");
    }

    public function save() {
        if (isset($_POST["action"])) {
            $key = $_POST["key"];
            $value = $_POST["value"];

            if ($key == "")
                return $this->index();

            $this->conf->load("static");
            $this->conf->set($key, $value);
            $this->conf->save("static");

        }
        return $this->index();
    }

    public function delete() {
        $key = "";
        if (isset($this->path[3]))
            $key = $this->path[3];

        if ($key == "")
            return $this->index();

        $this->conf->load("static");
        $this->conf->del($key);
        $this->conf->save("static");

        return $this->index();
    }
}