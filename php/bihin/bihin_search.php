<?php require '../menu.php'; ?>

<form action="bihin_edit.php" method="post">
    <input type="submit" value="新規登録">
</form>

<form action="" method="post">
    備品名：<input type="text" name="name"/>
    <input type="submit" value="検索" />
</form>


<table>
    <tr>
        <th width="100">備品ID</th>
        <th width="100">備品名</th>
        <th width="250">作成日付</th>
        <th width="250">更新日付</th>
        <th width="250">削除日付</th>
        <th>削除</th>
    </tr>

<?php

$pdo = new PDO("mysql:host=localhost;dbname=juku;charset=utf8", "root");

$sql = "select * from bihin where delete_date is null";
$bind = [];

if (!empty($_REQUEST['name'])) {
    $sql .= " and name like ?";
    $bind[] = "%". $_REQUEST['name']. "%";
}

$sql = $pdo->prepare($sql);
$sql->execute($bind);
$result = $sql->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $val) {
    echo "<tr>";
        echo "<td>". $val['id']. "</td>";
        echo "<td><a href='bihin_edit.php?id=". $val['id']. "&name=". $val['name']. "'>". $val['name']. "</a></td>";
        echo "<td>". $val['create_date']. "</td>";
        echo "<td>". $val['update_date']. "</td>";
        echo "<td>". $val['delete_date']. "</td>";
        echo "<td><button type='button' onclick='location.href=\"bihin_delete.php?id=". $val['id']. "&delete=1\"'>削除</button></td>";
    echo "</tr>";
}
?>


</table>
