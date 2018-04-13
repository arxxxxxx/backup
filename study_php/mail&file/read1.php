<?php
//オープンモード「ｒ」でファイルを開く
$file = @fopen('access.log','r') or die(',ファイルを開けませんでした。');

//共有ロックをする
flock($file,LOCK_SH);
//ファイルの終端に来るまで繰り返す
//feof()はファイルポインタ（カーソルみたいなもの）が終端に来るとTRUEを返す
//while(!feof($file)){
    //1行読み込む
    //fgets()は１行分文字列を取得した後に、ファイルポインタを１行進めてくれるもの
    //$line = fgets($file);
    //echo '<p>'.$line.'</p>';
//}
$count = 0;
while(!feof($file)){
    $line = fgets($file);
    echo '<p>'.$line.'</p>';
    $count++;
}

//ロック解除
flock($file,LOCK_UN);
fclose($file);

//最後の行分の１を引いてから出力する
echo ($count-1).'回の訪問がありました。';