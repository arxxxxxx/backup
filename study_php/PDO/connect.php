<?php

//データベース情報を設定
//文字コードは「utf-8」ではなく「utf8」なので注意！
$dsn = 'mysql:dbname=sample2;host=localhost;charset=utf8';
//ユーザ名
$user = 'root';
//パスワード
$password = 'mysql';

//挿入したいデータを格納
$name='太田美香';
$age = 32;

//tryとはこれ以降でエラーがあった場合catchで例外処理を行うという意味
try{
    //データベースに接続する
    $dbh = new PDO($dsn,$user,$password);
    
    //エラーをどこまで報告するか指定する
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //:name,:ageとすることで後で変数の値を置き換えることができる
    //VALUE()関数はINSERT文のみ
    $sql = "INSERT INTO user (name,age) VALUE (:name,:age)";
    
    //プリペアドステートメント 変数の当てはめを待機する状態にする
    //クライアントからの入力値をSQL文に当てはめる場合は必ずプリペアードステートメントを使用する
    //プリペアードステートメントをすることによってSQLインジェクションなどの悪意のある入力値を無害なものに変換する処理が行われる
    $stmt = $dbh->prepare($sql);
    
    //SQLに変数の値を当てはめる
    //:nameを変数$nameに置き換える
    $stmt->bindValue(':name',$name,PDO::PARAM_STR);
    //:ageを変数$ageに置き換える
    $stmt->bindValue(':age',$age,PDO::PARAM_INT);
    
    //値が文字列の場合は後ろにPARAM_STRを指定する
    //値が数字の場合は後ろにPARAM_INTを指定する
    
    
    //コメントアウト
    //SQL文を格納する
    //$sql = "INSERT INTO user (id,name,age,email) VALUES(NULL,'田中三郎','28','sample5@sample5.com')";
    //$stmt = $dbh->prepare($sql);
    
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