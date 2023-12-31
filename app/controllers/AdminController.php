<?php

namespace app\controllers;

use app\core\Controller;

class AdminController extends Controller {

    public function __construct($route) {
        parent::__construct($route);
        $this->view->layout = 'admin';
    }

    public function loginAction() {
        if (isset($_SESSION['admin'])) {
            $this->view->redirect('admin/moderation');
        }

        if (!empty($_POST)) {
            if (!$this->model->validateAccount(['login', 'password'], $_POST)) {
                $this->view->message('error', $this->model->error);
            }
            if (!$this->model->checkData($_POST['login'], $_POST['password'])) {
                $this->view->message('error', $this->model->error);
            }

            $this->model->login($_POST['login']);

            if (!empty($_POST['rememberMe'])) {
                $userData = [
                    'login' => base64_encode($_POST['login']),
                    'password' => base64_encode($_POST['password']),
                    'rememberMe' => 'checked',
                ];

                setcookie('rememberMe', json_encode($userData), time() + 14 * 24 * 60 * 60, "/admin/login");
            }
            $this->view->location('admin/moderation');
        }
        $vars = (!empty($_COOKIE['rememberMe'])) ? json_decode($_COOKIE['rememberMe'], true) : [];
        $this->view->render('Вхід до Адмін Панелі', $vars);
    }

    public function logoutAction() {
        unset($_SESSION['admin']);
        $this->view->redirect('admin/login');
    }

    public function moderationAction() {
        $result = $this->model->getAllProducts();
        $vars = [
            'products' => $result,
        ];

        $this->view->render('Редагування', $vars);
    }

    public function editAction() {
        $product = $this->model->getProductById($this->route['id']);
        if (!$product) {
            $this->view->redirect('admin/moderation');
        }

        if (!empty($_POST)) {
            if (!$this->model->validateProduct(['name', 'price', 'creator', 'publisher', 'category'], $_POST)) {
                $this->view->message('error', $this->model->error);
            }

            $uploadFile = '';
            if (!empty($_FILES['image']['tmp_name'])){
                if (!$this->model->isImageFile($_FILES['image'])) {
                    $this->view->message('error', $this->model->error);
                }
                $uploadFile = $this->model->uploadImage($_FILES['image']);
                if (!$uploadFile) {
                    $this->view->message('error', 'Error uploading file');
                }
            }
            $this->model->editProduct($product[0]['id'], $_POST, $uploadFile);
            $this->view->message('success', 'Дані збережено');
        }

        $vars = [
            'product' => $product[0],
        ];

        $this->view->render('Редагування', $vars);
    }

    public function deleteAction() {
        $product = $this->model->getProductById($this->route['id']);
        if (!$product) {
            $this->view->redirect('admin/moderation');
        }

        $this->model->deleteProduct($product[0]['id'], $product[0]['image']);
        $this->view->redirect('admin/moderation');
    }

    public function addAction() {
        if (!empty($_POST)) {
            if (!$this->model->validateProduct(['name', 'price', 'creator', 'publisher', 'category'], $_POST)) {
                $this->view->message('error', $this->model->error);
            }
            if (!$this->model->isImageFile($_FILES['image'])) {
                $this->view->message('error', $this->model->error);
            }
            if ($this->model->isProductExistsByName($_POST['name'])) {
                $this->view->message('error', $this->model->error);
            }

            $uploadFile = $this->model->uploadImage($_FILES['image']);
            if ($uploadFile) {
                $this->model->addProduct($uploadFile, $_POST);
                $this->view->message('success', 'Товар успішно доданий');
            } else {
                $this->view->message('error', 'Error uploading file');
            }
        }
        $this->view->render('Додавання');
    }
    public function registerAction() {
        if (!empty($_POST)) {
            if (!$this->model->validateAccount(['email', 'nickname', 'login', 'password'], $_POST)) {
                $this->view->message('error', $this->model->error);
            }
            if ($this->model->isEmailExists($_POST['email'])) {
                $this->view->message('error', $this->model->error);
            }
            if (!$this->model->isLoginExists($_POST['login'])) {
                $this->view->message('error', $this->model->error);
            }

            $this->model->register($_POST);
            $this->view->message('success', 'Реєстрацію успішно завершено, лист з інформацією про акаунт було відправлено.');
        }
        $this->view->render('Реєстрація');
    }
}