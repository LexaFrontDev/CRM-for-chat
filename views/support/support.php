<?php
include_once "../../controller/support/getProblem.php";




?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/styles/css/index.css">
    <title>Поддержка</title>
</head>
<body>


<div class="aside">
    <ul class="aside-list">
        <li class="aside-items Statistics"><a href="../../views/statistic/Statistics.php"><img src="../../assets/images/statistic-up-svgrepo-com.svg"  alt="Статистика" aria-label="Статистика"></a></li>
        <li class="aside-items support"><a href="../../views/support/support.php"><img src="../../assets/images/support-svgrepo-com.svg" alt="поддержка задачи" aria-label="Поддержка"></a></li>
        <li class="aside-items settings"><a href="../../views/settings/settings.php"><img src="../../assets/images/settings-svgrepo-com.svg" alt="Настройки" aria-label="Настройки"></a></li>
    </ul>
</div>


<div class="container">

    <h1 class="countProblemHead">Количество проблемы: <?= $countProblem ?></h1>

    <?php foreach ($problems as $result): ?>

        <div class="line"></div>
        <h1>пользовател: <?= $result['userName'] ?></h1>
        <h3>Почта: <?= $result['userEmail'] ?></h3>
        <p>проблема: <?= $result['supportText'] ?></p>
        <a  class="helpUser" href="suppUsers.php?supp=<?= htmlspecialchars($result['id']) ?>">Написать в почту</a>

        <div class="line"></div>
    <?php endforeach; ?>
</div>



</body>
</html>
