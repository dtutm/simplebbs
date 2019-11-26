<?php 
$yourName = "";

// echo '関数チェック'.checkSpace($_POST['yourName']); // 名前欄の空白の確認
$yourName = checkSpace($_POST['yourName']);
// echo '名前ポストは'.$_POST['yourName'];     //デバッグ用コマンド
// var_dump($yourName);                      //デバッグ用コマンド
// echo '<br>'; //デバッグ用コマンド

$yourText = checkSpace($_POST['yourText']); // テキスト欄の空白確認
// echo '書き込みポストは'.$_POST['yourText']; //デバッグ用コマンド
// var_dump($yourText); //デバッグ用コマンド
// echo '変数は'.$yourText; //デバッグ用コマンド
// exit ('ここで終了、書き込み内容');

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
    $stmt = $dbh->prepare('INSERT INTO bbslogs(name, text) VALUES(:insertName, :insertText)');
    $stmt->bindValue(':insertName',(string)$yourName,PDO::PARAM_STR);
    $stmt->bindValue(':insertText',(string)$yourText,PDO::PARAM_STR);
    $stmt->execute();
    header("Location: ./bbs.php");

} catch(PDOException $e) {
    echo $e;
}

// 1 : POSTよりデータを取得するx
// 2 : 各データを変数へ格納x
// 3 : SQL文の準備x
// 4 : 各データをバインドするx

// 書き込みを出来ない条件
// 1 : 空白であること（名前がスペース含む） <-実装完了
// 2 : 本文が256文字を超えていること


// 文字列のNULL、空白確認
function checkSpace($checkData){
    if(empty($checkData)){
        header("Location: ./bbs.php");          //NULLを確認した為、ページへ戻る
        exit;
        } else {
            if(mb_strpos($checkData, ' ') === 0 || mb_strpos($checkData, '　') === 0) {
                header("Location: ./bbs.php");  //1文字目に空白を確認した為、ページに戻る
                exit;
                } else {
                    return $checkData;
                    $checkData = '';
                }
        } 
}



?>