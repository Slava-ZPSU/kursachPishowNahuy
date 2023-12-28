<?php

namespace app\controllers;

use app\core\Controller;

class CartController extends Controller {
    public function addProductToCartAction() {
        $productInCart = $this->model->getProductInCart($_SESSION['account']['id'], $this->route['id']);

        header('Content-Type: application/json');
        http_response_code(200);

        if (count($productInCart) > 0) {
            echo json_encode([
                'status' => false,
                'message' => 'Товар вже доданий до корзини',
            ]);
        } else {
            $this->model->addProductToCart($_SESSION['account']['id'], $this->route['id']);

            echo json_encode([
                'status' => true,
                'message' => 'Товар успішно додано до корзини',
            ]);
        }
    }
    public function showCartAction() {
        $result = $this->model->getProductsInCart($_SESSION['account']['id']);
        $vars = [
            'products' => $result,
        ];

        $this->view->render('Кошик', $vars);
    }
}