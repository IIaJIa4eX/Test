<?php

class feed_back extends ControllerBase {

    /**
     * @var config $config
     */
    private $config;

    public function __construct()
    {
        $this->config = app::Current()->getConfig();
    }

    public function block() {

        $conf = "feedback";
        $sec  = "none";
        
        if (isset($this->arr["conf"]))
            $conf = $this->arr["conf"];

        if (isset($this->arr["sec"]))
            $sec = $this->arr["sec"];

        $config = app::Current()->getConfig();
        $config->load($conf);

        $data = $config->get($sec);

        return $this
                ->Render()
                ->WriteHTML($data, "feed_back", "block");
    }

}