<?php

class statictext extends ControllerBase {

    /**
     * @var config $config
     */
    private $config;

    public function __construct()
    {
        $this->config = app::Current()->getConfig();
    }

    public function block() {

        $conf = "none";
        $sec  = "none";
        
        if (isset($this->params["conf"]))
            $conf = $this->params["conf"];

        if (isset($this->params["sec"]))
            $sec = $this->params["sec"];

        $config = app::Current()->getConfig();
        $config->load($conf);

        $data = $config->get($sec);

        return $this
                ->Render()
                ->WriteHTML($data, "statictext", "block");
    }

}