<?php 
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SimpleBBS by DTUTM</title>
        <link rel="stylesheet" href="forIndex.css">
    </head>


    <body>
    
    <div class="container">
    <span class="main-form">

    <h1 class="title-text">SimpleBBS</h1>

    <form action="login.php" method="post">
        <p>
            <span class="form-name">Login ID</span>
            <input class="form-design" type="text" name="userId">
        </p>
        <p>
            <span class="form-name">Password</span>
            <input class="form-design" type="password" name="userPassword">
        </p>
        <p class="error-message">
        <?php
            //var_dump($_SESSION['errorFlag']); 
            if($_SESSION['errorFlag'] == false) { 
                echo 'ログインID、またはパスワードが違います。'; 
                $_SESSION['errorFlag'] = true;
            }
            //var_dump($_SESSION['errorFlag']);
        ?>
        </p>
        <input type="submit" value="ログイン" name="loginStart">
    </form>    
    </span>
    </div>
    
    </body>

</html>
