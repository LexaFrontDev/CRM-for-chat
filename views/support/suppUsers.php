<?php
session_start();
$pageId = $_GET['supp'];



require_once "../../model/config/DatabaseConnect.php";
$db = new DatabaseConnect();
$conn = $db->getConnection();
$getProblem = $db->getDate('SELECT id_user, supportText FROM support WHERE id = :id', ['id' => $pageId]);
$userId = $getProblem['id_user'];
$getUserDate = $db->getDate('SELECT username, email FROM users WHERE id = :id', ['id' => $userId]);


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
    <title>Напистаь в почту</title>
</head>
<body>

<?php if (isset($errMsg)) { ?>
    <div style="font-family:sans-serif;color:#FF0000;text-align:center;font-size:17px;"><?php echo $errMsg; ?></div>
<?php } ?>

<?php if (isset($succMsg)) { ?>
    <div style="font-family:sans-serif;color:#31ff00;text-align:center;font-size:17px;"><?php echo $succMsg; ?></div>
<?php } ?>

<a class="exit" href="support.php">выйти</a>

<form action="../../controller/doneTask/doneTasks.php" method="post">
    <input type="hidden" name="id_tasks" title="Выйти" value="<?= $pageId ?>">
    <button class="doneTask" title="Выполненно">Выполненно</button>
</form>

<form action="../../controller/support/sendMail.php" class="colorful-form" method="post">
    <input type="hidden"  name="pageId" value="<?=$pageId?>">
    <input type="hidden"  name="username" value="<?=$getUserDate['username']?>">
    <input type="hidden" name="userMail" value="<?= $getUserDate['email']?>">
    <input type="hidden" name="problemUser" value="<?=$getProblem['supportText']?>">
    <p class="problemUser">проблема:<?=$getProblem['supportText'] ?></p>
    <div class="form-group">
        <label class="form-label" for="message">Message:</label>
        <textarea  placeholder="Напишите пользователю: <?=$getUserDate['username'] ?> почта пользователя: <?=$getUserDate['email'] ?>" class="form-input" name="message" id="message"></textarea>
    </div>
    <button class="form-button" type="submit">Отправить</button>
</form>


</body>
</html>
