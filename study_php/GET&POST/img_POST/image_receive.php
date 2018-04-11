<?php
$err = array();

//画像データを配列で取得
//スーパーグローバル変数$_FILESは画像のデータを取得する
$img = $_FILES['img'];

//画像データの中身を確認
var_dump($img);


//バリデーション機能

//画像ファイルの形式を取得する
//exif_imagetype()はファイル形式を数値に変換して返す「２」でjpeg「３」でpng
$type = exif_imagetype($img['tmp_name']);
//IMAGETYPE_JPEGとIMAGETYPE_PNGは事前にそれぞれ「２」、「３」と定義されている定数
if($type !== IMAGETYPE_JPEG && $type !== IMAGETYPE_PNG){
    $err['pic'] = '対象ファイルはPNGまたはJPGのみです';
}elseif($img['size'] > 102400){ //ファイルサイズを確認する(102400バイト)
    $err['pic'] = 'ファイルサイズは100KB以下にしてください';
}else{
    //ドット以降の画像名を取得（例:jpg）
    $extension = pathinfo($img['name'],PATHINFO_EXTENSION);
    
    //ファイル名を乱数にする md5(uniqid(mt_rand(),true))は乱数化した名前を作るための定番コード
    //ファイル名を変更するのは多重拡張子などのセキュリティ上の問題を避けるため
    //乱数にして重複しない名前を作り、その後ろに拡張子名をつなげる
    $new_img = md5(uniqid(mt_rand(),true)).'.'.$extension;
    
    move_uploaded_file($img['tmp_name'],'./img/'.$new_img);
}
    //コメントアウト
    //一時的にサーバ上にアップロードされたファイルは公開フォルダに移動する必要がる
    //画像ファイルを仮のディレクトリから「img」ディレクトリに移動
    //組み込み関数move_uploaded_file()は第一引数は現在地、第二引数は移動先でありファイル名も位置情報の一部とみなされる
    //move_uploaded_file($img['tmp_name'],'./img/'.$img['name']);
?>

<html>
    <head>
        <meta charset="utf-8">
    </head>
    
    <body>
        <h1>受信ページ</h1>
        <?php if(count($err) >0){
                foreach($err as $row){
                    echo '<p>'.$row.'</p>';
                }
                echo '<a href="./image_send.php">戻る</a>';
              }else{
                ?>
                <div><img src="http://localhost/study_php/GET&POST/img_POST/img/<?php echo $img['name'];?>"></div>
        <?php } ?>
    </body>
</html>

<?php

//$_FILESには送信された画像の様々なデータを格納している
//['name']はファイル名、['type]はファイルのMINIタイプ、['tmp_name']はxamppフォルダ内の「tmp」フォルダ内にできたファイル名
//['error']はアップロード時のエラーコード、['size']はファイルサイズ

?>