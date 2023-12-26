<?php
namespace app\models;

use app\core\Model;

class Admin extends Model {
    public function loginValidate($post) {
        $config = require 'app/config/admin.php';

        if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
            $this->error = 'Логин или пароль указан неверно';
            return false;
        }
        return true;
    }
}
