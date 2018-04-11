<?php

$dsn = 'mysql:dbname=sample2;host=localhost;charset=utf8';
$user = 'root';
$password = 'mysql';

try{
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    //全件取得する
    $sql = "SELECT * FROM user";
    
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $data = array();
    
    //rowCount()メソッドで行数を取得する
    $count = $stmt->rowCount();
    
    //配列$dateに行を格納していく
    //fetch(PDO::FETCH_ASSOC)で１行のデータを連想配列で取得する
    //fetch(ふぇっち)とは1行を取り出すという意味。whileの条件式とすることで該当の行があるだけ繰り返し取得してくれる
    //これを$date[]に入れることで二次元配列になる
    
    //fetch()はデフォルトでPDO::FETCH_BOTHが設定されている。この設定では連想配列とともに添え文字列を返す
    //通常は連想配列のみを返すPDO::FETCH_ASSOCのオプションをあえて指定することが多い
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $date[] = $row;
    }
    
    echo '処理が終了しました。';

}catch(PDOException $e){
    print($e->getMessage());
    die();
}
//コメントアウト
//$dateの中身を確認する
//var_dump($count);
//var_dump($date);

?>

<html>
    <body>
        <h1>会員データ一覧</h1>
        <table border=1>
            <tr><th>id</th><th>名前</th><th>年齢</th><th>メールアドレス</th></tr>
            
            <!-- $dateを$rowとして取り出す -->
            <?php foreach($date as $row): ?>
            
                <!-- 配列のキーにカラム名を指定する -->
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['age'];?></td>
                    <td><?php echo $row['email'];?></td>
                </tr>
            
            <!-- foreachの終わり -->
            <?php endforeach; ?>
        </table>
    </body>
</html>