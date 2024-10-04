<?php

class Auth {
    private $conn;
    private $table_name = "admins";

    public $admin_id;
    public $admin_fullname;
    public $email;
    public $password;

    public function __construct($db) {
        $this->conn = $db;
    }



    public function login($admin_fullname, $email, $password) {
        $stmt = $this->conn->prepare('SELECT * FROM ' . $this->table_name . ' WHERE admin_fullname = ? OR email = ?');
        $stmt->execute([$admin_fullname, $email]);

        if ($stmt->rowCount() == 0) {
            $_SESSION['errMsg'] = 'Пользователь с такими данными не зарегистрирован';
            header('Location: ../../index.php');
            exit();
        } else {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        if (password_verify($password, $user['password'])) {
            setcookie('admin_fullname', $user['admin_fullname'], time() + (86400 * 30), "/");
            header('Location: ../../index.php');
            exit();
        } else {
            $_SESSION['errMsg'] = 'Неверный пароль';
            header('Location: ../../index.php');
            exit();
        }
    }
}

?>
