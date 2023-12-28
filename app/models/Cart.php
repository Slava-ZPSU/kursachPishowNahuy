<?php

namespace app\models;

use app\core\Model;

class Cart extends Model {
    public function addProductToCart($userId, $productId) {
        $params = [
            'account_id' => $userId,
            'product_id' => $productId,
            'price' => $this->db->column('SELECT price FROM Products WHERE id = :id', ['id' => $productId]),
        ];

        $this->db->query("INSERT INTO Cart (account_id, product_id, price) VALUES (:account_id, :product_id, :price)", $params);
    }

    public function getProductInCart($userId, $productId) {
        $params = [
            'account_id' => $userId,
            'product_id' => $productId,
        ];

        return $this->db->row("SELECT * FROM Cart WHERE account_id = :account_id AND product_id = :product_id", $params);
    }

    public function getProductsInCart($userId) {
        $params = [
            'account_id' => $userId,
        ];

        $productsId = $this->db->row("SELECT product_id FROM Cart WHERE account_id = :account_id", $params);

        $products = [];
        foreach ($productsId as $productId) {
            $prodParams = [
                'id' => $productId["product_id"],
            ];
            $products[] = $this->db->row("SELECT * FROM Products WHERE id = :id", $prodParams);
        }

        return $products;
    }

}