<?php

session_start();
require_once "../../model/config/DatabaseConnect.php";
$db = new DatabaseConnect();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['newAdminName'], $_POST['adminOldName'])) {
        $newName = $_POST['newAdminName'];
        $oldName = $_POST['adminOldName'];


        $checkName = $db->getDate('SELECT admin_fullname FROM admins WHERE admin_fullname = :newName', [':newName' => $newName]);

        if ($checkName && count($checkName) > 0) {
            $_SESSION['errMsg'] = 'Это имя уже занято. Выберите другое имя.';
            header('Location: ../../views/settings/settings.php');
            exit();
        } else {
            $updateName = $db->update(
                'UPDATE admins SET admin_fullname = :newName WHERE admin_fullname = :oldName',
                ['newName' => $newName, 'oldName' => $oldName]
            );

            if ($updateName) {
                setcookie('admin_fullname', $newName, time() + (86400 * 30), "/");
                $_SESSION['succMsg'] = 'Имя успешно изменено';
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




