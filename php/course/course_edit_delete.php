<?php require '../menu.php'; ?>

<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8','root');
$sql=$pdo->prepare('select * from courseid where id=?');
$sql->execute([$_REQUEST['id']]);
foreach ($sql as $course) {
	echo '<p class="sakujyo"><b>削除しますか？</b></p>';
	echo '<form action="course_edit_delete2.php" method="post">';
	echo '<input type="hidden" name="id" value="',$course['id'],'">';
	echo '<input type="hidden" name="name" value="',$course['name'],'">';
	echo 'コースID：',$course['id'];
	echo '<br>';
	echo "\t";
	echo 'コース名：',$course['name'];
	echo '<br>';
	echo '<br>';
	echo '<input class="btn1" type="button" onclick="history.back()" value="戻る">';
	echo "\t";
	echo '<input class="btn2" type="submit" value="削除">';
	echo '</form>';
}
?>
