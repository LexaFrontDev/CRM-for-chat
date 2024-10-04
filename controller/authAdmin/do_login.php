<?php

require_once __DIR__ . "/../../model/config/DatabaseConnect.php";
require_once __DIR__ . "/../../model/Auth.php";

$db = new DatabaseConnect();
$conn = $db->getConnection();
$admin = new Auth($conn);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['adminName'], $_POST['adminEmail'], $_POST['adminPass'])) {
        $name = $_POST['adminName'];
        $email = $_POST['adminEmail'];
        $pass = $_POST['adminPass'];


        $result = $admin->login($name, $email, $pass);

        if ($result) {
            echo $result;
        }
    }
}
?>
