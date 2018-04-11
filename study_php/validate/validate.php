<?php
    //入力内容に誤りがあればエラーメッセージを、正しければ「あなたの好きな映画は～です」と表示する
                
    //ページを訪れた時点では$_POST['movie]はまだ存在していないため空文字を入れて初期化する
    $movie = '';
                
    //$_SERVERとはスーパーグローバル変数と呼ばれるもので自動的に生成される
    //REQUEST_METHODとは'POST'されてきたかどうかを判定するキー
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $movie = $_POST['movie'];  
                    
        //$movieの文字数によって$errに文字列を代入する
        if(mb_strlen($movie) === 0){
            $err = '文字を入力してください';
        }elseif(mb_strlen($movie) > 20){
            $err = '20文字以内で入力してください';
        }
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <style type="text/css">
            .center{text-align:center;}
            input{margin:5px;}
        </style>
    </head>
    
    <body>
        <div class="center">
            <h1>入力フォームを検証しよう</h1>
            <?php
                //入力内容に誤りがあればエラーメッセージを、正しければ「あなたの好きな映画は～です」と表示する
                if(isset($err)){
                    echo $err;
                }else{
                    echo 'あなたの好きな映画は'.$movie.'です。';
                }
            ?>
            <!-- actionに何も記述しなかった場合自身のファイルに向かって送信するため"action=validate.php"と同じ動きをする -->
            <form action="" method="POST">
                <label>好きな映画</label>
                <input type="text" name="movie"><br>
                <input type="submit">
            </form>
        </div>
    </body>
</html>