<?php 
session_start();

$user = 'user';
$HashPass = password_hash('admin', PASSWORD_BCRYPT); // パスワードをハッシュ化
$_SESSION['errorFlag'] = 0;

if($_POST['userId'] == $user && password_verify($_POST['userPassword'], $HashPass)){
        header("Location: ./bbs.php");
    } else {
        $_SESSION['errorFlag'] = false;
        header("Location: ./index.php");        
}


?>