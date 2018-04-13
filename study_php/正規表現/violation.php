<?php
//「検索しやすいように文字列を整える」「許可ワードを検索対象から外す」「禁止ワードをチェックする」

$str = 'ミルクコーヒー';

//検索しやすいように文字列を整える
//英字を大文字から小文字に変換
$target = mb_strtolower($str,'UTF-8');
//半角カタカナや全角スペースなどを変換
$target = mb_convert_kana($target,'KVas','UTF-8');
//半角スペースや句読点を取り除く
$target = preg_replace('/\s|、|。/','',$target);
//フラグをセットする
$flag = 0;


//許可ワードを検索対象から外す
$ok_words = array('フライパン','コーヒーぜりー');

foreach($ok_words as $ok_word){
    //許可ワードが含まれるかチェック
    if(mb_strpos($target,$ok_word) !== FALSE){
        //許可ワードを「*」に変換
        $target = str_replace($ok_word,'*',$target);
    }
}

//禁止ワードをチェックする
$ng_words = array('パン','コーヒー');

foreach($ng_words as $ng_word){
    //禁止ワードのチェック
    if(mb_strpos($target,$ng_word) !== FALSE){
        //見つけたらflagに１を代入しforeachを終了
        $flag = 1;
        break;
    }
}


if($flag === 0){
    echo '禁止ワードは含まれていません。';
}else{
    echo '禁止ワードが含まれています。';
}


echo "{$str}->{$target}";

