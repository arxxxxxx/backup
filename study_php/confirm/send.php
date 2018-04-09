<html>
    <head>
        <meta charset="utf-8">
    </head>
    
    <body>
        <h1>練習フォーム</h1>
        <p>次のページへデータを渡してみよう。</p>
        <!-- この下にフォームを追加します -->
        <form action="./confirm.php" method="POST">
            <label>お名前</label>
            <input type="text" name="user_name">
            <labal>趣味</labal>
            <input type="text" name="hobby">
            <input type="submit" value="確認する">
        </form>
    </body>
</html>