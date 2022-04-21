<?php require '../header.php'; ?>
<p>アカウントを追加します。</p>
<form action="insert-output.php" method="post">
アカウント名<input type="text" name="name">
パスワード<input type="text" name="password">
<input type="submit" value="追加">
</form>
<?php require '../footer.php'; ?>
