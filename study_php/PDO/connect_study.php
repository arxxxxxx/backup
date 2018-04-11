<?php

$dsn = 'mysql:dbname=sample2;host=localhost;charset=utf8';
//ユーザ名
$user = 'root';
//パスワード
$password = 'mysql';

//挿入したいデータを格納
$email='prepare@statement.com';

//tryとはこれ以降でエラーがあった場合catchで例外処理を行うという意味
try{
    //データベースに接続する
    $dbh = new PDO($dsn,$user,$password);
    
    //エラーをどこまで報告するか指定する
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "UPDATE user SET email = :email WHERE id = 3";
    
    //プリペアドステートメント 変数の当てはめを待機する状態にする
    //クライアントからの入力値をSQL文に当てはめる場合は必ずプリペアードステートメントを使用する
    //プリペアードステートメントをすることによってSQLインジェクションなどの悪意のある入力値を無害なものに変換する処理が行われる
    $stmt = $dbh->prepare($sql);
    
    $stmt->bindValue(':email',$email,PDO::PARAM_STR);
    
    $stmt->execute();
    echo '処理が終了しました';
    
//例外を検知する
//PDOException $eと書くことでエラー内容を$eに格納し、$e->getMessage()でエラー内容の文字列を返す
}catch(PDOException $e){
    //例外を処理する
    print($e->getMessage());
    //処理を停止する
    die();
}