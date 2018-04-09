<?php

$score = mt_rand(0,100);
echo '得点は'.$score.'です<br>';

if($score >= 0 && $score < 60){
    echo '平均点以下です。';
}else if($score >= 60 && $score < 80){
    echo '平均点を超えています。';
}else if($score >= 80 && $score < 100){
    echo '優秀な点数です';
}else if($score === 100){
    echo '満点です！';
}else{
    echo '入力して数値が違います。';
}