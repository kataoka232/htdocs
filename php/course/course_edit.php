<?php require '../menu.php'; ?>

<h1 class="midashi">コース編集</h1>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8','root');
if (isset($_REQUEST['command'])) {
	switch ($REQUEST['command']) {
	case 'update':
		if (empty($_REQUEST['name']) ||
			!preg_match('/[0-9]+/',$_REQUEST['id'])) break;
		$sql=$pdo->prepare('update courseid set name=? where id=?');
		$sql->execute(
			[htmlspecialchars($_REQUEST['name']),$_REQUEST['id']]);
		break;
	case 'delete':
		$sql=$pdo->prepare('delete from courseid where id=?');
		$sql->execute([$_REQUEST['id']]);
		break;
	}
}
$sql=$pdo->prepare('select * from courseid where id=?');
$sql->execute([$_REQUEST['id']]);
foreach ($sql as $course) {
	echo '<form class"ib" action="course_edit_update.php" method="post">';
	echo '<input type="hidden" name="command" value="update">';
	echo '<input type="hidden" name="id" value="',$course['id'],'">';
	echo 'コースID：',$course['id'];
	echo '<br>';
	echo 'コース名：<input type="text" name="name" value="',$course['name'],'">';
	echo '<br>';
	echo '<br>';
	echo '<input class="btn1" type="button" onclick="history.back()" value="戻る">';
	echo "\t";
	echo '<input class="btn2" type="submit" value="変更">';
	echo "\t";
	echo '<div style="display:inline-flex">';
	echo '</form>';
	echo '<form class="ib" action="course_edit_delete.php" method="post">';
	echo '<input type="hidden" name="command" value="delete">';
	echo '<input type="hidden" name="id" value="',$course['id'],'">';
	echo '<input class="btn3" type="submit" value="削除">';
	echo '</form>';
	echo '</div>';
}
?>
