<?php

namespace app\models;

use app\core\Model;

class Account extends Model {
    public function validate($inputs, $post) {
        $rules = [
            'email' => [
                'pattern' => '#^([A-z0-9_.-]{1,20}+)@([a-z0-9_.-]+)\.([a-z\.]{2,10})$#',
                'message' => 'Не правильно вказана електронна адреса',
            ],
            'nickname' => [
                'pattern' => '#^[A-z0-9\s]{1,20}$#',
                'message' => 'Не правильно вказане ім\'я користувача. Ім\'я має складатись тільки з латинських символів та цифр, довжиною від 1 до 20 символів',
            ],
            'login' => [
                'pattern' => '#^[A-z0-9]{3,20}$#',
                'message' => 'Не правильно вказаний логін. Логін має складатись тільки з латинських символів та цифр, довжиною від 3 до 20 символів',
            ],
            'password' => [
                'pattern' => '#^[A-z0-9]{8,30}$#',
                'message' => 'Не правильно вказаний пароль. Пароль має складатись тільки з латинських символів та цифр, довжиною від 8 до 30 символів',
            ],
        ];

        foreach ($inputs as $item) {
            if (empty($post[$item]) || !preg_match($rules[$item]['pattern'], $post[$item])) {
                $this->error = $rules[$item]['message'];
                return false;
            }
        }

        return true;
    }

    // Actions
    public function register($post) {
        $token = $this->createToken();

        $params = [
            'email' => $post['email'],
            'nickname' => $post['nickname'],
            'login' => $post['login'],
            'password' => password_hash($post['password'], PASSWORD_BCRYPT),
            'token' => $token,
            'status' => 0,
        ];

        $this->db->query("INSERT INTO Accounts (email, nickname, login, password, token, status) VALUES (:email, :nickname, :login, :password, :token, :status)", $params);

        mail($post['email'], 'Register', 'Confirm: http://kursachweb2023/account/confirm/' .$token);
    }

    public function activate($token) {
        $params = [
            'token' => $token,
        ];
        $this->db->query('UPDATE accounts SET status = 1, token = "" WHERE token = :token', $params);
    }

    public function login($login) {
        $params = [
            'login' => $login,
        ];

        $data = $this->db->row('SELECT * FROM Accounts WHERE login = :login', $params);

        $_SESSION['account'] = $data[0];
    }

    public function save($post) {
        $params = [
            'id' => $_SESSION['account']['id'],
            'nickname' => $post['nickname'],
            'email' => $post['email'],
        ];

        $sql = '';
        if (!empty($post['password'])) {
            $params['password'] = password_hash($post['password'], PASSWORD_BCRYPT);
            $sql = ', password = :password';
        }

        foreach ($params as $key => $item) {
            $_SESSION['account'][$key] = $item;
        }

        $this->db->query("UPDATE Accounts SET email = :email, nickname = :nickname" .$sql. " WHERE id = :id", $params);

    }

    public function reset($token) {
        $new_password = $this->createToken();
        $params = [
            'token' => $token,
            'password' => password_hash($new_password, PASSWORD_BCRYPT),
        ];
        $this->db->query('UPDATE accounts SET password = :password, token = "" WHERE token = :token', $params);
        return $new_password;
    }


    public function recovery($post) {
        $token = $this->createToken();

        $params = [
            'email' => $post['email'],
            'token' => $token,
        ];

        $this->db->query("UPDATE Accounts SET token = :token WHERE email = :email", $params);

        mail($post['email'], 'Recovery', 'Confirm: http://kursachweb2023/account/reset/' .$token);

    }


    // Checking
    public function isEmailExists($email) {
        $params = [
            'email' => $email,
        ];
        $result = $this->db->column('SELECT id FROM Accounts WHERE email = :email', $params);

        if (empty($result)) {
            $this->error = 'Не існує користувача з такої адресою електронної пошти';
        } else {
            $this->error = 'Вже існує користувач з такої адресою електронної пошти';
        }
        return $result;
    }

    public function isLoginExists($login) {
        $params = [
            'login' => $login,
        ];

        if ($this->db->column('SELECT id FROM Accounts WHERE login = :login', $params)) {
            $this->error = 'Вже існує користувач з таким логіном';
            return false;
        }

        return true;
    }

    public function isTokenExists($token) {
        $params = [
            'token' => $token,
        ];

        return $this->db->column('SELECT id FROM Accounts WHERE token = :token', $params);
    }

    public function createToken() {
        return substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuwxyz", 5)), 0, 30);
    }



    public function checkData($login, $password) {
        $params = [
            'login' => $login,
        ];

        $hash = $this->db->column('SELECT password FROM Accounts WHERE login = :login', $params);

        if (!$hash || !password_verify($password, $hash)) {
            $this->error = 'Логін або пароль вказані неправильно';
            return false;
        } else {
            return true;
        }
    }

    public function checkStatus($type, $data) {
        $params = [
            $type => $data,
        ];

        $status = $this->db->column('SELECT status FROM Accounts WHERE ' .$type. ' = :'.$type,  $params);

        if ($status != 1) {
            $this->error = 'Ви ще не активували цей аккаунт';
            return false;
        } else {
            return true;
        }
    }
}