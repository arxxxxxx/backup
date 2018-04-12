<?php

$id = '';

//GETデータの取得
if(isset($_GET['id'])){
    //intにキャストしてから取得する
    $id = (int)$_GET['id'];
}

$dsn = 'mysql:dbname=sample2;host=localhost;charset=utf8';
$user = 'root';
$password = 'mysql';
$data = [];

//データベースに接続しデータ取得
try{
    
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    //ヒアドキュメント
    //＜＜＜とアルファベットを合わせることで改行コードが反映された形での代入が可能になる
    //コメントアウト　ヒアドキュメントはBrackets及びapachの環境構築が必要
//    $sql = <<<SQL 
//    SELECT user.name,
//        user.age,
//        club.club_name,
//        club.count,
//        club.overview
//    FROM user
//    JOIN club ON user.club_id = club.club_id
//    WHERE user.id = :id
//    LIMIT 1
//    SQL; //ヒアドキュメントの終わりを示すコードで行頭に書かなければエラーになる
    
    $sql = "SELECT user.name,user.age,club.club_name,club.count,club.overview FROM user JOIN club ON user.club_id = club.club_id WHERE user.id = :id LIMIT 1";
    
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id',$id,PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //var_dump($row);
}catch(PDOException $e){
    echo('接続エラー:'.$e->getMessage());
    die();
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <style type="text/css">
            .search{float:right;}
        </style>
    </head>
    
    <body>
        <div class="search">
            <p>会員IDを入力してください</p>
            <form action="" method="GET">
                <input type="text" name="id">
                <input type="submit" value="確認する">
            </form>
        </div>
        <h1>会員データ</h1>
        
        <!-- データが存在していれば一件表示 -->
        <?php
        //会員データが存在しなければ
        if($row === FALSE): 
        ?>
        
        <p>存在しない会員IDです</p>
        
        <?php 
        //会員データが存在しなければ
        else: 
        ?>
        
        <table border="1">
            <tr>
                <th>お名前</th>
                <th>年齢</th>
                <th>クラブ</th>
                <th>月の活動回数</th>
                <th>概要</th>
            </tr>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['age'] ?></td>
                <td><?php echo $row['club_name'] ?></td>
                <td><?php echo $row['count'] ?></td>
                <td>
                    <?php
                    //出力前にjavascriptなどのプログラムの実行を防ぐためにhtmlspecialcharsを利用する
                    echo nl2br(htmlspecialchars($row['overview'],ENT_QUOTES,'UTF-8')); 
                    ?>
                </td>
            </tr>
        </table>
        
        <?php
        //if文の終わり
        endif;
        ?>
        
    </body>
</html>