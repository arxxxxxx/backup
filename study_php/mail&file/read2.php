<?php
//ファイルに内容を行ごとに格納した配列で取得
$file = file('access.log');
var_dump($file);
//配列の要素ごとに出力
foreach($file as $line){
    echo '<p>'.$line.'</p>';
}

//file()は記述が少なくて便利な関数だがファイルサイズが大きくなったらfgets()を優先的に使うようにする