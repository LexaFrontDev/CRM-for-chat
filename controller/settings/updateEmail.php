<?php

session_start();
require_once "../../model/config/DatabaseConnect.php";
$db = new DatabaseConnect();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['adminName'], $_POST['newEmail'])) {
        $nameAdmin = $_POST['adminName'];
        $newEmail = $_POST['newEmail'];
        if(empty($nameAdmin) || empty($newEmail)){
            $_SESSION['errMsg'] = 'Напишите новую почту пожалуйста';
            header('Location: ../../views/settings/settings.php');
            exit();
        }

        $checkEmail = $db->getDate('SELECT email FROM admins WHERE email = :newEmail', [':newEmail' => $newEmail]);

        if ($checkEmail && count($checkEmail) > 0) {
            $_SESSION['errMsg'] = 'Эта почта уже занята. Выберите другую почту.';
            header('Location: ../../views/settings/settings.php');
            exit();
        } else {
            $updateEmail = $db->update(
                'UPDATE admins SET email = :newEmail WHERE admin_fullname = :name',
                ['newEmail' => $newEmail, ':name' => $nameAdmin]
            );

            if ($updateEmail) {
                $_SESSION['succMsg'] = 'Почта успешно изменена';
                header('Location: ../../views/settings/settings.php');
                exit();
            } else {
                $_SESSION['errMsg'] = 'Не получилось изменить, попробуйте позже';
                header('Location: ../../views/settings/settings.php');
                exit();
            }
        }
    }
}
