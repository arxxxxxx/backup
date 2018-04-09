<?php
//POSTされた値を取得する
//実際の制作では変数に代入後、文字列前後の空白を削除したり、値の検証などを行ったりすることが多い
//そのため、一度変数に格納してから改めてechoするようにする。
$name = $_POST['user_name'];
$hobby = $_POST['hobby'];
?>

<html>
    <head>
        <meta charset="utf-8">
    </head>
    
    <body>
        <h1>登録ページ</h1>
        <!-- HTMLの中にechoプログラムを埋め込みましょう -->
        <p>こんにちは<?php echo $user_name:?>さん</p>
        <p>趣味は<?php echo $hobby;?>ですね</p>
        <p>登録完了致しました。</p>
    </body>
    
</html>