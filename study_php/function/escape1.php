<?php
//関数の名前を付ける
function html_escape($word){
    //処理したデータを返す
    return htmlspecialchars($word,ENT_QUOTES,'UTF-8');
}

$word = '<h1>こんにちは</h1>';
//そのままechoする
echo $word;
//関数を通してからechoする
echo html_escape($word);