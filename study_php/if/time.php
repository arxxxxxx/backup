<?php

$time = date('G');

if($time < 12){
    echo '午前';
}else if($time >= 12){
    echo '午後';
}