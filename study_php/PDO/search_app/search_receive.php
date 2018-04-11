<?php

//POSTされた場合のみPOSTデータを取得する
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
}

$dsn = 'mysql:dbname=sample2;host=localhost;charset=utf8';
$user = 'root';
$password = 'mysql';

//$dataを配列として初期化する
$data = [];

try{
    
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    //LIKEを使ってSQL文を作る
    $sql = "SELECT id,name FROM user WHERE name LIKE :name";
    $stmt = $dbh->prepare($sql);
    
    //変数を当てはめる
    $stmt->bindValue(':name','%'.$name.'%',PDO::PARAM_STR);
    $stmt->execute();
    
    $count = $stmt->rowCount();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }
    
    echo '処理が終了しました。';
    
}catch(PDOException $e){
    echo($e->getMessage());
    die();
}

?>

<html>
    <body>
        <h1>会員データ一覧</h1>
        <p><?php echo $count;?>件見つかりました</p>
        <table border=1>
            <tr><th>id</th><th>名前</th></tr>
            <?php foreach($data as $row): ?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['name'];?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>