<?php require '../menu.php'; ?>

<?php
    if (empty($_REQUEST['id'])) {
        echo "<h1>備品新規登録画面</h1>";
        echo "<h3>新規登録する備品名を入力し、登録ボタンを押してください。</h3>";
    } else {
        echo "<h1>備品更新画面</h1>";
        echo "<h3>更新する内容を入力し、登録ボタンを押してください。</h3>";
    }
?>


<div style="display:inline-flex">
    <form action="bihin_check.php" method="post">

<?php
    if (!empty($_REQUEST['id'])) {
        echo "備品ID：<input type='text' name='id' value='". $_REQUEST['id']. "' disabled />";
        echo "備品名：<input type='text' name='name' value='". $_REQUEST['name']. "' />";
        echo "&nbsp;&nbsp;";
        echo "<input type='submit' value='登録' />&nbsp;";
    } else {
        echo "備品名：<input type='text' name='name' value=''/>";
        echo "&nbsp;&nbsp;";
        echo "<input type='submit' value='登録' />";
    }
?>

    </form>
    &nbsp;&nbsp;
    <button type="submit" onclick="history.back()">戻る</button>
</div>

