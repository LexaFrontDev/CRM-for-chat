<?php
require_once "../../model/config/DatabaseConnect.php";
$db = new DatabaseConnect();
$conn = $db->getConnection();
$countProblem = $db->getTableCount('support');
$getProblems = $db->getAll('SELECT * FROM support');
$problems = [];

foreach ($getProblems as $problem) {
    $userId = $problem['id_user'];
    $supportText = $problem['supportText'];
    $problemId = $problem['id'];
    $getUserInfo = $db->getDate('SELECT username, email FROM users WHERE id = :id', ['id' => $userId]);

    if (!empty($getUserInfo)) {
        $userName = $getUserInfo['username'];
        $userEmail = $getUserInfo['email'];
    } else {
        $userName = "Неизвестный пользователь";
        $userEmail = "Email не найден";
    }

    $problems[] = [
        'id' => $problemId,
        'supportText' => $supportText,
        'userName' => $userName,
        'userEmail' => $userEmail
    ];
}


