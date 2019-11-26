<?php
// phpinfo();
//echo 'やるじゃない';
require_once('bbs_result.php');

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
            <div class="title">SimpleBBS</div>
            <div class="userName">ようこそ user さん</div>
        </div>

        <div class="inputArea">
            <form action="bbs_addlogs.php" method="post">
                <div class="fromAdmin">
                    <div class="fromAdminTitle">please, your message.</div>
                    <div class="jpnMessage">何かメッセージを残していって下さいね</div>
                </div>

                <div class="parts-setting">
                    <p class="input-font">name.</p>
                    <input class="input-name" type="name" name="yourName">
                    <p class="input-font">message.</p>
                    <input class="input-text" type="text" name="yourText">
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

        <!--
        <div class="loglist">
            <p class="your-name">しおやなぎ</p>
            <p class="your-text">初投稿です、よろしくお願いします！</p>
            <p class="write-date">2019-11-20 21:48:08</p>
        </div>
        -->
    

    </body>
</html>