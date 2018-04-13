<html>
    <body>
        <h1>ひとこと掲示板</h1>
        <table border=1>
            <tr style="background-color: orange">
                <th>名前</th><th>コメント</th><th>時刻</th>
            </tr>
            <!-- $dataが１件以上あれば出力する -->
            <?php if(count($data)) :
            foreach($data as $row) : ?>
            <tr>
                <td><?php echo html_escape($row['name']); ?></td>
                <!-- html_escape()の後でnl2br() -->
                <!-- もし先にnl2br()が行われた場合改行コードに変換されて次にhtml_escape()でHTMlタグが無効化されるため改行が行われなくなる -->
                <td><?php echo nl2br(html_escape($row['comment'])); ?></td>
                <td><?php echo $row['created']; ?></td>
            </tr>
            <?php endforeach;
                  endif; ?>
        </table>
        <?php if(count($errs)){
                foreach($errs as $err){ //エラーがあれば出力する
                    echo '<p style="color: red">'.$err.'</p>';
                }
            }?>
        <form action="" method="POST">
            <p>お名前*<input type="text" name="name">(50文字まで)</p>
            <p>ひとこと*<textarea name="comment" rows="4" colos="40"></textarea>(200文字まで)</p>
            <input type="submit" value="書き込む">
        </form>
    </body>
</html>