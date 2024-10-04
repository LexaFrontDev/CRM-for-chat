<?php

require_once "../../model/config/DatabaseConnect.php";
$db = new DatabaseConnect();
$conn = $db->getConnection();



if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['id_tasks']))
        {
            $taskId = $_POST['id_tasks'];
            $doneTasks = $db->delete('DELETE FROM support WHERE id = :id', [':id' => $taskId]);
            header('Location: ../../views/support/support.php');
        }
}