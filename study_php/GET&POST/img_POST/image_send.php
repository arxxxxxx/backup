<html>
    <head>
        <meta charset="utf-8">
    </head>
    
    <body>
        <h1>画像アップ</h1>
        <!-- enctype="multipart"/form-dataと指定することで、データを配列で送信することができる -->
        <form action="image_receive.php" method="post" enctype="multipart/form-data">
            <p><input type="file" name="img"></p>
            <p><input type="submit" value="送信"></p>
        </form>
    </body>
</html>