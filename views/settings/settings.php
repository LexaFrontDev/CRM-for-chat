<?php
session_start();
$adminUserName = isset($_COOKIE['admin_fullname']) ? $_COOKIE['admin_fullname'] : '';
require_once "../../model/config/DatabaseConnect.php";
$db = new DatabaseConnect();
$conn = $db->getConnection();
$getEmail = $db->getDate('SELECT email FROM admins WHERE admin_fullname = :admin_name',  [':admin_name' => $adminUserName]);




if (isset($_SESSION['errMsg'])) {
    $errMsg = $_SESSION['errMsg'];
    unset($_SESSION['errMsg']);
}


if (isset($_SESSION['succMsg'])) {
    $succMsg = $_SESSION['succMsg'];
    unset($_SESSION['succMsg']);
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/styles/css/index.css">
    <title>настройки</title>
</head>
<body>

<?php if (isset($errMsg)) { ?>
    <div style="font-family:sans-serif;color:#FF0000;text-align:center;font-size:17px;"><?php echo $errMsg; ?></div>
<?php } ?>

<?php if (isset($succMsg)) { ?>
    <div style="font-family:sans-serif;color:#31ff00;text-align:center;font-size:17px;"><?php echo $succMsg; ?></div>
<?php } ?>

<div class="aside">
    <ul class="aside-list">
        <li class="aside-items Statistics"><a href="../../views/statistic/Statistics.php"><img src="../../assets/images/statistic-up-svgrepo-com.svg"  alt="Статистика" aria-label="Статистика"></a></li>
        <li class="aside-items support"><a href="../../views/support/support.php"><img src="../../assets/images/support-svgrepo-com.svg" alt="поддержка задачи" aria-label="Поддержка"></a></li>
        <li class="aside-items settings"><a href="../../views/settings/settings.php"><img src="../../assets/images/settings-svgrepo-com.svg" alt="Настройки" aria-label="Настройки"></a></li>
    </ul>
</div>

<div class="container-settings">
    <a class="exitInAccount" href="../../controller/authAdmin/logout.php">Выйти с аккаунта</a>


    <div class="wrapUpdate">
        <form class="formUpd updateName" action="../../controller/settings/updateName.php" method="post">
            <input type="hidden" name="adminOldName" value="<?=htmlspecialchars($adminUserName) ?>">
            <label class="LabUpd" for="newAdminName">Изменить имя</label>
            <input class="updInp updateName" type="text" placeholder="Имя" name="newAdminName" value="<?= htmlspecialchars($adminUserName) ?>" >
            <button class="updButton">изменить имя</button>
        </form>

        <form class="formUpd formUpdEmail" action="../../controller/settings/updateEmail.php" method="post">
            <input type="hidden" name="adminName" value="<?=htmlspecialchars($adminUserName) ?>">
            <label class="LabUpd" for="newEmail">Изменить почту</label>
            <input class="updInp updateEmail" type="email" placeholder="Почта" name="newEmail" value="<?= $getEmail['email']?>" >
            <button class="updButton">изменить почту</button>
        </form>
    </div>

</div>



</body>
</html>









</body>
</html>
