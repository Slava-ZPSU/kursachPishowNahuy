<?php
namespace app\models;

use app\core\Model;

class Admin extends Model {
    public function validateAccount($inputs, $post) {
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

    public function validateProduct($inputs, $post) {
        $rules = [
            'name' => [
                'pattern' => '#^[A-z0-9\s]{1,50}$#',
                'message' => 'Не правильно вказана назва товару. Назва має складатись тільки з латинських символів та цифр, довжиною від 1 до 50 символів.',
            ],
            'price' => [
                'pattern' => '#^\d+(\.\d+)?$#',
                'message' => 'Не правильно вказана ціна товару. Ціна має складатись тільки з цифр.',
            ],
            'creator' => [
                'pattern' => '#^[A-z0-9\s,.]{5,50}$#',
                'message' => 'Не правильно вказаний розробник товару. Розробник має складатись тільки з латинських символів та цифр, довжиною від 5 до 50 символів',
            ],
            'category' => [
                'pattern' => '#^[A-Za-z0-9 ,-]{3,100}$#',
                'message' => 'Не правильно вказанана категорія товару. Категорія має складатись тільки з латинських символів, цифр, ком та тире, довжиною від 3 до 1000 символів',
            ],
            'publisher' => [
                'pattern' => '#^[A-z0-9\s,.]{8,50}$#',
                'message' => 'Не правильно вказаний видавець товару. Видавець має складатись тільки з латинських символів та цифр, довжиною від 8 до 50 символів',
            ],
            'description' => [
                'pattern' => '#^.|\n{1,5000}$#',
                'message' => 'Не правильно вказаний опис. Опис має складатись з любих символів, довжиною від 1 до 5000 символів',
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
    public function login($login) {
        $params = [
            'login' => $login,
        ];

        $data = $this->db->row('SELECT * FROM Admins WHERE login = :login', $params);

        $_SESSION['admin'] = $data[0];
    }

    public function register($post) {
        $params = [
            'email' => $post['email'],
            'nickname' => $post['nickname'],
            'login' => $post['login'],
            'password' => password_hash($post['password'], PASSWORD_BCRYPT),
            'role' => 'regular',
        ];

        $this->db->query("INSERT INTO Admins (email, nickname, login, password, role) VALUES (:email, :nickname, :login, :password, :role)", $params);

        mail($post['email'], 'Register', "Доброго дня, " . $post['nickname'] . ".\nВас було зареєстровано на нашому сайті в якості адміністратора.\nВаші:\nЛогін: " . $post['login'] . ",\nПароль: " . $post['password'] . "\nПосилання на панель адміністратора: http://kursachweb2023/admin/login.");

    }

    public function getAllProducts() {
        $sql = "SELECT * FROM Products";
        return $this->db->row($sql);
    }

    public function editProduct($id, $post, $newImage) {
        $params = [
            'id' => $id,
            'name' => $post['name'],
            'price' => $post['price'],
            'creator' => $post['creator'],
            'publisher' => $post['publisher'],
            'category' => $post['category'],
            'description' => $post['description'],
        ];

        $sql = '';
        if ($newImage != '') {
            $oldImage = $this->db->column("SELECT image FROM Products WHERE id = :id", ['id' => $id]);
            $sql = "SELECT id FROM Products WHERE image = :image AND id != :id";

            if (!$this->db->column($sql, ['image' => $oldImage, 'id' => $id])) {
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }

            $params['image'] = $newImage;
            $sql = ', image = :image';
        }

        $this->db->query("UPDATE Products SET name = :name, price = :price, creator = :creator, publisher = :publisher, category = :category, description = :description" .$sql. " WHERE id = :id", $params);
    }

    public function deleteProduct($id, $image) {
        $params = [
            'id' => $id,
        ];

        $oldImage = $this->db->column("SELECT image FROM Products WHERE id = :id", ['id' => $id]);
        $sql = "SELECT id FROM Products WHERE image = :image AND id != :id";

        if (!$this->db->column($sql, ['image' => $oldImage, 'id' => $id])) {
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        }

        $this->db->query('DELETE FROM Products WHERE id = :id', $params);
    }


    public function addProduct($fileDir, $post) {
        $params = [
            'image' => $fileDir,
            'name' => $post['name'],
            'price' => $post['price'],
            'creator' => $post['creator'],
            'publisher' => $post['publisher'],
            'category' => $post['category'],
            'description' => $post['description'],
        ];
        $this->db->query("INSERT INTO Products (image, name, price, creator, publisher, category, description) VALUES (:image, :name, :price, :creator, :publisher, :category, :description)", $params);
    }

    public function uploadImage($file) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($file['name']);

        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            return '/' .$uploadFile;
        }
        return false;
    }

    // Checking
    public function checkData($login, $password) {
        $params = [
            'login' => $login,
        ];

        $hash = $this->db->column('SELECT password FROM Admins WHERE login = :login', $params);

        if (!$hash || !password_verify($password, $hash)) {
            $this->error = 'Логін або пароль вказані неправильно';
            return false;
        } else {
            return true;
        }
    }

    public function isEmailExists($email) {
        $params = [
            'email' => $email,
        ];
        $result = $this->db->column('SELECT id FROM Admins WHERE email = :email', $params);

        if (empty($result)) {
            $this->error = 'Не існує адміна з такої адресою електронної пошти';
        } else {
            $this->error = 'Вже існує адмін з такої адресою електронної пошти';
        }
        return $result;
    }

    public function isLoginExists($login) {
        $params = [
            'login' => $login,
        ];

        if ($this->db->column('SELECT id FROM Admins WHERE login = :login', $params)) {
            $this->error = 'Вже існує адмін з таким логіном';
            return false;
        }
        return true;
    }

    public function isProductExistsByName($name) {
        $params = [
            'name' => $name,
        ];

        if ($this->db->column('SELECT id FROM Products WHERE name = :name', $params)) {
            $this->error = 'Вже існує товар з такою назвою';
            return true;
        } else {
            $this->error = 'Не існує товара з такою назвою';
            return false;
        }
    }

    public function getProductById($id) {
        $params = [
            'id' => $id,
        ];

        return $this->db->row('SELECT * FROM Products WHERE id = :id', $params);
    }

    public function isImageFile($file) {
        // Перевіряємо, чи не виникли помилки під час завантаження файлу
        if (!file_exists($file['tmp_name'])) {
            $this->error = 'Файл не завантажено';
            return false;
        }

        if ($file['error'] !== UPLOAD_ERR_OK) {
            $this->error = 'Помилка під час завантаження файлу';
            return false;
        }

        // Отримуємо інформацію про зображення за допомогою функції getimagesize
        $imageInfo = @getimagesize($file['tmp_name']);

        // Перевіряємо, чи отримали інформацію та чи вказано MIME-тип
        if ($imageInfo !== false && isset($imageInfo['mime'])) {
            // Перевіряємо MIME-тип на приналежність до зображень
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (in_array($imageInfo['mime'], $allowedMimeTypes)) {
                return true; // Файл є зображенням
            }
        }
        $this->error = 'Завантажений файл не є зображенням';
        return false; // Файл не є зображенням
    }
}
