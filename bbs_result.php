<?php

$sql = null;
$resule = null;

//BBSの初期読み込み
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
    echo '接続成功';

    $prepare = $dbh->prepare('SELECT * FROM bbslogs');
    $prepare->execute();
    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

    //print_r($result);　$resultの中身を全て表示
    echo '<br>';

    //ViewAllLogs($result); //テーブルの内容を全表示

} catch(PDOException $e) {
    echo $e;
}

function ViewAllLogs($bbslogs){
    $num = 0;
    // print_r($bbslogs);
    do {
        echo '<div class="loglist">';
        echo '<p class="your-name">'.$bbslogs[$num]['name'].'<p>';
        echo '<p class="your-text">'.$bbslogs[$num]['text'].'<p>';
        echo '<p class="write-date">'.$bbslogs[$num]['writetime'].'<p>';
        echo '</div>';
        $num++;
    } while(isset($bbslogs[$num]['id']));
}

/* バックアップ
function ViewAllLogs($bbslogs){
    $num = 0;
    // print_r($bbslogs);
    do {
        echo $bbslogs[$num]['name'];
        echo $bbslogs[$num]['text'];
        echo $bbslogs[$num]['writetime'];
        echo '<br>';
        $num++;
    } while(isset($bbslogs[$num]['id']));
}
*/

?>
