<?php
//チェックボックスを取得する
$colors = $_POST['colors'];
var_dump($colors);
?>

<html>
    <head>
        <meta charset="utf-8">
    </head>
    
    <body>
        <h1>受信ページ</h1>
        
        <h3>好きな色</h3>
        
        <ul>
        <?php foreach($colors as $var){ ?>
        <!-- 悪意のある特殊文字を変換し、javascriptなどの動作ができないよう無効化しておく -->
        <li><?php echo htmlspecialchars($var, ENT_QUOTES,'UTF-8');?></li>
        <?php } ?>
        </ul>
        
        <p>あなたの好きな色は<?php echo implode('と',$colors);?>です。</p>
        
    </body>
</html>