<?php
//関数のファイルを読み込む
require_once('./module.php');

//エラー文格納用の配列の初期化
$errs = [];
//データベースから引き出すデータの格納用配列
$data = [];
//データベースに接続
$dbh = get_db_connect();

//バリデーションとデータ挿入
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    //POSTデータを取得
    $name = get_post('name');
    $comment = get_post('comment');
    
    //文字数のチェック
    if(!check_words($name,50)){ //文字制限を指定する
        $errs[] = 'お名前欄を修正してください。';
    }
    if(!check_words($comment,200)){
        $errs[] = 'コメント欄を修正してください。';
    }
    if(count($errs) === 0){
        $result = insert_comment($dbh,$name,$comment);
    }
}

//データを取得する
$data = select_comments($dbh);

//HTMLを読み込む
include_once('view.php');