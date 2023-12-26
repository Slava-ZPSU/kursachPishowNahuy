<?php

namespace app\models;

use app\core\Model;

class Main extends Model{
    public function getAllProducts() {
        $sql = "SELECT * FROM Products";
        return $this->db->row($sql);
    }

    public function getProductById($productId) {
        $sql = "SELECT * FROM products.php WHERE id = :id";
        return $this->db->row($sql, ['id' => $productId]);
    }
}