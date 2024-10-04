<?php
require_once "../../model/config/DatabaseConnect.php";
$db = new DatabaseConnect();
$conn = $db->getConnection();
$totalMessages = $db->getTableCount('messages');
$totalUsers = $db->getTableCount('users');