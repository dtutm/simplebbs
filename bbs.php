<?php
session_start();

//未ログインの状態の場合はログインページへ強制移動
if(!isset($_SESSION['userID'])){
    header("Location: ./index.php");
    exit;
}

require_once('bbs_result.php');
// var_dump($_SESSION);

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SimpleBBS by DTUTM</title>
        <link rel="stylesheet" href="forBbs.css">
    </head>

    <body>
        <div class="header">
            <p class="title">SimpleBBS</p>
            <p class="userName">ようこそ <?php echo $_SESSION['userID'] ?> さん</p>
            <a href="logout.php"><p class="logout">[ログアウトする]</p></a>
        </div>

        <div class="inputArea">
            <form action="bbs_addlogs.php" method="post">
                <div class="fromAdmin">
                    <div class="fromAdminTitle">please, your message.</div>
                    <div class="jpnMessage">何かメッセージを残していって下さいね</div>
                </div>

                <div class="parts-setting">
                    <!-- 入力の不備に関するエラーメッセージ -->
                    <?php
                    if(isset($_SESSION['noticeMessage'])){
                        echo '<p class="error-message">'.$_SESSION['noticeMessage'].'</p>';
                        $_SESSION['noticeMessage'] = null;
                    }
                    ?>
                    <p class="input-font">name.</p>
                    <input class="input-name" type="name" name="yourName">
                    <p class="input-font">message.</p>
                    <textarea class="input-text" name="yourText"></textarea>
                    <input class="input-submit" type="submit" value="send" name="textSend">
                </div>

                <!-- オレンジのボーダーラインを使い回すだけの部分 -->
                <div class="fromAdmin">
                    <div class="fromAdminTitle"></div>
                    <div class="jpnMessage"></div>
                </div>
            </form>
        </div>
        
        <!-- ここから書き込みを反映 -->
        <?php ViewAllLogs($result) ?>

    </body>
</html>