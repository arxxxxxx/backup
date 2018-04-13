<?php

//htmlspecialchars　出力前に特殊文字を変換する
function html_escape($word){
    return htmlspecialchars($word,ENT_QUOTES,'UTF-8');
}


//ポストデータの取得
//変数名を$keyとして取得
function get_post($key){
    //isset判定
    if(isset($_POST[$key])){
        //前後の空白を除去
        $var = trim($_POST[$key]);
        return $var;
    }
}


//文字列の長さをチェックする
//入力値が空及び第一引数の文字数が第二引数で指定した長さを超えていた場合FALSEを返す
function check_words($word,$length){ //第二引数に長さを設定
    
    if(mb_strlen($word) === 0){
        return FALSE; //問題があればFALSEを返す
    }elseif(mb_strlen($word) > $length){
        return FALSE;
    }else{
        return TRUE;
    }
}


//データベースへの接続
function get_db_connect(){
    try{
        $dsn = 'mysql:dbname=sample2;host=localhost;charset=utf8';
        $user = 'root';
        $password = 'mysql';
        
        $dbh = new PDO($dsn,$user,$password);
    }catch(PDOException $e){
        echo($e->getMessage());
        die();
    }
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //接続用の切符である$dbhを返しておく
    return $dbh;
}


//データを挿入 コメントを書き込む
function insert_comment($dbh,$name,$comment){ //切符とデータを渡す
    
    $date = date('Y-m-d H:i:s'); //現在の日時とデータを取得
    $sql = "INSERT INTO board (name,comment,created) VALUE (:name,:comment,'{$date}')"; //データはそのまま連結　ユーザーからの入力データではないため
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name',$name,PDO::PARAM_STR);
    $stmt->bindValue(':comment',$comment,PDO::PARAM_STR);
    if(!$stmt->execute()){
        return 'データの書き込みに失敗しました。';
    }
}


//データを取得する　全コメントデータを取得する
function select_comments($dbh){
    $data = [];
    $sql = "SELECT name, comment, created FROM board";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }
    return $data; //配列を返す
}


