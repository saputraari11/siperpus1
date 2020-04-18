<?php
session_start();
// var_dump($_SESSION);die;
session_destroy();
header("Location: http://localhost/siperpus/login/index.php");
exit;
?>