<?php
class DatabaseConnect {
    private $localhost = 'localhost';
    private $loginUser = 'root';
    private $nameBd = 'chat_app';
    private $password = '';

    private $conn;

    public function __construct() {
        try {
            $dsn = "mysql:host=$this->localhost;dbname=$this->nameBd";
            $this->conn = new PDO($dsn, $this->loginUser, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Ошибка подключения: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function delete($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount();
    }

    public function getDate($sql, $params = []) {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Ошибка получение данных: ' . $e->getMessage();
            return 0;
        }
    }

    public function getAll($sql, $params = []) {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Ошибка получения данных: ' . $e->getMessage();
            return [];
        }
    }




    public function getTableCount($table) {
        $sql = 'SELECT COUNT(*) AS total FROM ' . $table;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total'];
    }


    public function update($sql, $params = []) {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Ошибка выполнения запроса: " . $e->getMessage();
            return 0;
        }
    }
}
