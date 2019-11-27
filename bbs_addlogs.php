<?php 
session_start();

//未ログインの状態の場合はログインページへ強制移動
if(!isset($_SESSION['userID'])){
    header("Location: ./index.php");
    exit;
}

$yourName = "";
$yourText = "";

// 入力された名前に関するチェック欄（空白、規定ない文字数か）
$yourName = checkSpace($_POST['yourName']);
checkStringLength($yourName,16);

// 入力された名前に関するチェック欄（空白、規定ない文字数か）
$yourText = checkSpace($_POST['yourText']); // テキスト欄の空白確認
checkStringLength($yourText,256);

// データベースへ接続し、テーブルへデータを入力する
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


// 文字列のNULL、空白確認
function checkSpace($checkData){
    if(empty($checkData)){
        $_SESSION['noticeMessage'] = "名前、または書き込み内容が空白です";
        header("Location: ./bbs.php"); //NULLを確認した為、ページへ戻る
        exit;
        } else {
            if(mb_strpos($checkData, ' ') === 0 || mb_strpos($checkData, '　') === 0) {
                $_SESSION['noticeMessage'] = "名前、または書き込み内容が空白です";
                header("Location: ./bbs.php");  //1文字目に空白を確認した為、ページに戻る
                exit;
                } else {
                    return $checkData;
                    $checkData = '';
                }
        } 
}

// 文字数の確認、引数は「確認したい文字列の変数、規定文字数値」
function checkStringLength($checkString,$maxWordNumber) {
    $checkText = "";
    $checkText = mb_strlen($checkString);
    if($checkText > $maxWordNumber){
        $_SESSION['noticeMessage'] = "名前、または書き込み内容の文字数が多すぎます";
        // var_dump($checkText);
        // exit('文字数オーバー');
        header("Location: ./bbs.php"); //NULLを確認した為、ページへ戻る
        exit;
    } else {
        $_SESSION['noticeMessage'] = null;
        // exit('規定内文字数');
    }
}


?>