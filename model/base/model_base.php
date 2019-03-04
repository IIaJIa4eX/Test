<?php

class ModelBase {
    /**
     * @var db $db
     */
    protected $db;

    public function setDB($db) {
        $this->db = $db;
    }
}