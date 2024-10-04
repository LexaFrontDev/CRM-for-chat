<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username'], $_POST['userMail'], $_POST['problemUser'], $_POST['message'])) {
        $userName = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['userMail']);
        $supportText = htmlspecialchars($_POST['problemUser']);
        $messageAdmin = htmlspecialchars($_POST['message']);
        $pageId = $_POST['pageId'];


        $to = $email;
        $subject = "Сообщение от поддержки";
        $headers = "From: admin@example.com\r\n";
        $headers .= "Reply-To: admin@example.com\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";


        $body = "Здравствуйте, $userName!\n\n";
        $body .= "Тема поддержки: $supportText\n\n";
        $body .= "Сообщение:\n$messageAdmin\n";


        if (mail($to, $subject, $body, $headers)) {
            echo "Сообщение успешно отправлено!";
            $_SESSION['succMsg'] = 'Сообщение успешно отправлено!';
            header('Location: ../../views/support/suppUsers.php?supp=' . htmlspecialchars($pageId));

            exit();
        } else {
            $_SESSION['errMsg'] = 'Не удалось отправить сообщение.';
            header('Location: ../../views/support/suppUsers.php?supp=' . htmlspecialchars($pageId));

            exit();
        }
    } else {

        $_SESSION['errMsg'] = 'Пожалуйста, заполните все поля.';
        header('Location: ../../views/support/suppUsers.php?supp=' . htmlspecialchars($pageId));
        exit();
        }


}
