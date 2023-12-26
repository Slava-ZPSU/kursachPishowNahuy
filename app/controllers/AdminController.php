<?php

namespace application\controllers;

use app\core\Controller;

class AdminController extends Controller {

    public function __construct($route) {
        parent::__construct($route);
        $this->view->layout = 'admin';
    }

    public function loginAction() {
        if (isset($_SESSION['admin'])) {
            $this->view->redirect('admin/withdraw');
        }
        if (!empty($_POST)) {
            if (!$this->model->loginValidate($_POST)) {
                $this->view->message('error', $this->model->error);
            }
            $_SESSION['admin'] = true;
            $this->view->location('admin/withdraw');
        }
        $this->view->render('Вход');
    }

    public function logoutAction() {
        unset($_SESSION['admin']);
        $this->view->redirect('admin/login');
    }

}