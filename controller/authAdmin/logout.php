<?php

setcookie('admin_fullname', '', time() - 3600, "/");
header('Location: ../../index.php');
exit();