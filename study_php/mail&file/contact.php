<?php
//POSTされた時だけ実行
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $inquery = $_POST['inquery'];
    
    //英数字、ハイフン、「-」「+」「/」「？」に対応させている
    $pattern = '/\A([a-z0-9_\-\+\/\?]+)';
    //長い正規表現は２つにわける
    //アドレスの最後のドメイン名は2文字以上6文字以下と決められているため{2,6}で指定する
    $patterm .= '@([a-z0-9\-]+\.)+[a-z]{2,6}\z/i';
    
    //POSTデータのバリデーション
    if(!preg_match($pattern,$email)){
        $err = 'メールアドレスの形式が違います。';
    }
    if(!isset($err)){
        //データベースへの登録（今回は省略）
        //確認メールを送信
        mb_language("Japanese");
        mb_internal_encoding("utf-8");
        
        $subject = 'お問い合わせありがとうございます。';
        $inquery =<<<EOM
        {$name}さん、
        お問い合わせ内容:
        {$inquery}
        EOM;
        
        $headers = 'From: sender@sender.com'."\r\n";
        
        //メールの成功、失敗に応じてメッセージを格納
        if(mb_send_mail($email,$subject,$inquery,$headers) === FALSE){
            $message = 'メール送信に失敗しました。';
        }else{
            $message = 'お問い合わせを受け付けました。確認メールを送信しております。';
        }
    }
}
?>

<html>
    <head>
        <style>
            p.red-text{color:red;}
        </style>
    </head>
    
    <body>
        <h1>お問い合わせ</h1>
        <?php if(isset($message)){echo '<p class="red-text">'.$message.'</p>';} ?>
        <form action="" method="POST">
            <!-- 同じファイルに送信する -->
            <label>お名前</label>
            <p><input type="text" name="name"></p>
            <label>メールアドレス</label>
            <!-- エラーメッセージを出力 -->
            <?php if(isset($err)){echo '<p class="red-text">'.$err.'</p>';}?>
            <p><input type="text" name="email"></p>
            <label>お問い合わせ内容</label>
            <p><textarea name="inquery"></textarea></p>
            <input type="submit">
        </form>
    </body>
</html>