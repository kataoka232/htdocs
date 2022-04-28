<?php require '../menu.php'; ?>

<p>アカウント編集</p>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8','root');
if (isset($_REQUEST['command'])) {
	switch ($REQUEST['command']) {
	case 'update':
		if (empty($_REQUEST['name']) ||
			!preg_match('/[0-9]+/',$_REQUEST['id'])) break;
		$sql=$pdo->prepare('update account set name=?, password=? where id=?');
		$sql->execute(
			[htmlspecialchars($_REQUEST['name']),$_REQUEST['id'],$_REQUEST['password']]);
		break;
	case 'delete':
		$sql=$pdo->prepare('delete from account where id=?');
		$sql->execute([$_REQUEST['id']]);
		break;
	}
}
$sql=$pdo->prepare('select * from account where id=?');
$sql->execute([$_REQUEST['id']]);
foreach ($sql as $account) {
	echo '<form class"ib" action="update.php" method="post">';
	echo '<input type="hidden" name="command" value="update">';
	echo '<input type="hidden" name="id" value="',$account['id'],'">';
	echo 'アカウントID：',$account['id'];
	echo '<br>';
	echo '名前：<input type="text" name="name" value="',$account['name'],'">';
	echo '<br>';
    echo 'パスワード：<input type="text" name="password" value="',$account['password'],'">';
	echo '<br>';
	echo '<br>';
	echo '<input type="button" onclick="history.back()" value="戻る">','&emsp;';
	echo "\t";
	echo '<input type="submit" value="変更">','&emsp;';
	echo "\t";
	echo '<div style="display:inline-flex">';
	echo '</form>';
	echo '<form class="ib" action="delete.php" method="post">';
	echo '<input type="hidden" name="command" value="delete">';
	echo '<input type="hidden" name="id" value="',$account['id'],'">';
	echo '<input type="submit" value="削除">';
	echo '</form>';
	echo '</div>';
}
?>
<input type="button" onclick="location.href='./list.php'" value="リストに戻る">
