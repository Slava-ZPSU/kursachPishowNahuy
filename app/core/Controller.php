<?php

namespace app\core;

use app\core\View;

abstract class Controller {
    public $route;
    public $view;
    public $model;
    public $acl;

    public function __construct($route) {
        $this->route = $route;
        if (!$this->checkAcl()) {
            View::errorCode(403);
        }

        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    public function loadModel($name) {
        $path = 'app\models\\' .ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }

        return '';
    }

    public function checkAcl() {
        $this->acl = require 'app/acl/' .$this->route['controller']. '.php';
        if ($this->isAcl('all')) {
            return true;
        } else if (isset($_SESSION['account']['id']) && $this->isAcl('authorize')) {
            return true;
        } else if (!isset($_SESSION['account']['id']) && $this->isAcl('guest')) {
            return true;
        } else if (!isset($_SESSION['admin']) && $this->isAcl('admin')) {
            return true;
        } else {
            return false;
        }
    }

    private function isAcl($key) {
        if (array_key_exists($key, $this->acl)) {
            return in_array($this->route['action'] ,$this->acl[$key]);
        } else {
            return false;
        }
    }
}