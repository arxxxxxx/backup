<?php
//ポストされてきたデータを取得する
$user_name = $_POST['user_name'];
$hobby = $_POST['hobby'];
//動作の確認用
var_dump($user_name);
var_dump($hobby);
?>

<html>
    <head>
        <meta charset="utf-8">
    </head>
    
    <body>
        <h1>受信ページ</h1>
        <p>あなたの名前は<?php echo $user_name; ?>さんです</p>
        <p>趣味は<?php echo $hobby; ?>です。</p>
        <p>こちらの情報でよろしいですか？</p>
        <form action="complate.php" method="POST">
            <input type="hidden" name="user_name" value="<?php echo $user_name;?>">
            <input type="hidden" name="hobby" value="<?php echo $hobby;?>">
            <input type="submit" value="登録">
        </form>
    </body>
</html>