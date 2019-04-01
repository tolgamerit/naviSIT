<?php
session_start();
session_destroy();
session_unset();
unset($_SESSION['kullanici']);
unset($_SESSION['parola']);
header("Location:/naviSIT/index.php");
?>