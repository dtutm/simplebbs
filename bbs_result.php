<?php
session_start();

//未ログインの状態の場合はログインページへ強制移動
if(!isset($_SESSION['userID'])){
    header("Location: ./index.php");
    exit;
}

$sql = null;
$resule = null;

//データベースから書き込み内容のデータを読み込み
try {
    $dbh = new PDO(
        'mysql:host=127.0.0.1;dbname=simplebbs_log;charset=utf8',
        'root',
        '',
        array(
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        )
    );
    // echo '接続成功'; //デバッグ用コマンド

    $prepare = $dbh->prepare('SELECT * FROM bbslogs');
    $prepare->execute();
    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo $e;
}

//書き込み内容を表示する
function ViewAllLogs($bbslogs){
    $num = 0;
    do {
        $num++;
    } while(isset($bbslogs[$num]['id']));
    $num--; // ここまで降順表示の為の処理
    do {
        echo '<div class="loglist">';
        echo '<p class="your-name">'.$bbslogs[$num]['name'].'<p>';
        echo '<p class="your-text">'.nl2br($bbslogs[$num]['text']).'<p>'; //nr2brで改行を反映できます（<br>に変換してくれる）
        echo '<p class="write-date">'.$bbslogs[$num]['writetime'].'<p>';
        echo '</div>';
        $num--;
    } while(isset($bbslogs[$num]['id']));
}

?>
