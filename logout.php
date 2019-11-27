<?php
//ログアウトの処理
session_start();
$_SESSION = array();
session_destroy();
header("Location: ./index.php");
?>