<?php
$array = array(
    'name' => '鈴木',
    'hobby' => 'テニス',
    'email' => 'sample@sample.com'
);

foreach($array as $key => $var){
    echo $key.':'.$var.'<br>';
}

//省略形。要素をそのまま出力
foreach($array as $var){
    echo $var.'<br>';
}
?>