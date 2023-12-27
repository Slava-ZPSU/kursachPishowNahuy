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
        // Page
        if ($this->isAcl('all')) {                                                   // for all users
            return true;
        } else if (isset($_SESSION['account']['id']) && $this->isAcl('authorize')) { // for authorize users
            return true;
        } else if (!isset($_SESSION['account']['id']) && $this->isAcl('guest')) {    // for guest users
            return true;
        } else if (isset($_SESSION['admin']['role']) && ($_SESSION['admin']['role'] == 'regular' || $_SESSION['admin']['role'] == 'main') && $this->isAcl('regularAdmin')) { // for regular admins
            return true;
        } else if (isset($_SESSION['admin']['role']) && $_SESSION['admin']['role'] == 'main' && $this->isAcl('mainAdmin')) { // for main admin
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