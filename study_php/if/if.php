<?php

$language = 1;

//型判定を厳密にするため、セキュリティ上を意識したうえで===を使用したほうが望ましい
if($language === 1){
    echo 'こんにちは';
}else if($language === 2){
    echo 'Hello';
}else if($language === 3){
    echo 'Bonjour';
}else{
    echo '入力した数値と違います';
}