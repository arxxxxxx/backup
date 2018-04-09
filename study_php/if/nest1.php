<?php

$attend = 1;
//欠席は0 出席は1
$place = 'b';

if($attend === 0){
    echo 'パーティーを欠席にて承りました';
}else{
    echo 'パーティーを出席にて承りました！<br>';
    if($place === 'a'){
        echo '会場はAホテルでございます。';
    }else if($place === 'b'){
        echo '会場はBホテルでございます。';
    }
}