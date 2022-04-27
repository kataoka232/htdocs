<?php require '../menu.php'; ?>

<h1>確認画面</h1>

<table>
    <tr>
        <th>備品ID</th>
        <th>備品名</th>
    </tr>
    <tr>
        <td><?php echo empty($_REQUEST['id']) ? "" : $_REQUEST['id']; ?></td>
        <td><?php echo empty($_REQUEST['name']) ? "" : $_REQUEST['name']; ?></td>
    </tr>
</table>

<form action="" method="post">

<?php
    if (!empty($_REQUEST['delete'])) {
        echo "<a>削除しますか？</a>";
    } else {
        echo "<a>登録しますか？</a>";
    }

    echo "<input type='submit' value='はい'>";
    echo "<button type='submit' onclick='history.back()'>いいえ</button>";
?>

</form>
