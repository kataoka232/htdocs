<?php session_start();?>
<table name="listTable"	>
<?php require '../menu.php'; ?>
<p>アカウント一覧</p>
<p>アカウント名</p>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8','root');
foreach($pdo->query('select * from account where delete_flg = 0') as $account) {
    echo '<tr>';
    echo '<td>',$account['id'],'</td>';
    echo "　";
	echo '<td>',$account['name'],'</td>';
	echo "\t";
	echo '<td>';
	echo '<a href="edit.php?id=',$account['id'],'">編集</a>','<br>';
	echo '</td>';
	echo '</tr>';
}
?><br>
<input type="button" onclick="location.href='./insert.php'" value="新規登録">
<input type="button" onclick="location.href='./itiran_kensaku.php'" value="検索">
</table>
<?php require '../footer.php'; ?>
 