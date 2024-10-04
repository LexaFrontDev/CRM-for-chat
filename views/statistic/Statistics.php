<?php
include_once "../../controller/Statistic/getStatic.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>График сообщений и пользователей</title>
    <link rel="stylesheet" href="../../assets/styles/css/index.css">
</head>
<body>


<div class="aside">
    <ul class="aside-list">
        <li class="aside-items Statistics"><a href="../../views/statistic/Statistics.php"><img src="../../assets/images/statistic-up-svgrepo-com.svg"  alt="Статистика" aria-label="Статистика"></a></li>
        <li class="aside-items support"><a href="../../views/support/support.php"><img src="../../assets/images/support-svgrepo-com.svg" alt="поддержка задачи" aria-label="Поддержка"></a></li>
        <li class="aside-items settings"><a href="../../views/settings/settings.php"><img src="../../assets/images/settings-svgrepo-com.svg" alt="Настройки" aria-label="Настройки"></a></li>
    </ul>
</div>

<h1 class="head">Статистика</h1>



<div class="chart" id="chart">
    <div class="bar-container">
        <div class="bar" data-messages="<?= $totalMessages ?>" style="height: 0;"></div>
        <span>Сообщения</span>
        <input type="hidden" class="messages-input" value="<?= $totalMessages ?>">
    </div>
    <div class="bar-container">
        <div class="bar" data-users="<?= $totalUsers ?>" style="height: 0;"></div>
        <span>Пользователи</span>
        <input type="hidden" class="users-input" value="<?= $totalUsers ?>">
    </div>

</div>

<div class="wrap-count">
    <h1>Сколько сообщение было написанно: <?=$totalMessages ?></h1>
    <h1>Сколько Людей пользуються нашим сайтом: <?=$totalUsers ?></h1>
</div>

<script src="../../assets/src/index.js"></script>

</body>
</html>

