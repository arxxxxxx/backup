<?php
//コメントアウト
//POSTデータ全体の中身を知る
//var_dump($_POST);

//文字列を整数に変換する
$name = $_POST['name'];
$sex = (int)$_POST['sex'];
$blood = $_POST['blood'];
$comment = $_POST['comment'];

?>

<html>
    <head>
        <meta charset="utf-8">
    </head>
    
    <body>
        <h1>受信ページ</h1>
        <p>あなたの名前は<?php echo $name;?>さんです。</p>
        <p>性別は
        <?php
            //数字を意味ある文字列に返す
            if($sex === 1){
                echo '男性';
            }else{
                echo '女性';
            }
        ?>
        です。</p>
        <p>血液型は<?php echo $blood; ?>型です。</p>
        <p>
        <!-- 改行を反映させる。nl2br()とはnew line to <br>という意味で改行コードを<br>に変換する -->
        <?php echo nl2br($comment); ?>
        </p>
    </body>
</html>