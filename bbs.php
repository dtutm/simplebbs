<?php

//echo 'やるじゃない';

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
            <form>
            <div class="fromAdmin">
                <div class="fromAdminTitle">please, your message.</div>
                <div class="jpnMessage">何かメッセージを残していって下さいね</div>
            </div>

            <div class="parts-setting">
                <p class="input-font">name.</p>
                <input class="input-name" type="name">
                <p class="input-font">message.</p>
                <input class="input-text" type="text">
                <input class="input-submit" type="submit" value="send">
            </div>

            <!-- オレンジのボーダーラインを使い回すだけの部分 -->
            <div class="fromAdmin">
                <div class="fromAdminTitle"></div>
                <div class="jpnMessage"></div>
            </div>

            </form>
        </div>
    </div>

    </body>
</html>