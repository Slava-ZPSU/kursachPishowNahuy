<?php

namespace app\core;

use app\lib\Database;

abstract class Model {
    public $db;
    public $error;

    public function __construct() {
        $this->db = new Database;
    }
}