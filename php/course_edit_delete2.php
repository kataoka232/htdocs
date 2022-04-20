<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8','root');
$sql=$pdo->prepare('delete from courseid where id=?');
if ($sql->execute([$_REQUEST['id']] )) {
	echo '削除しました。';
} else {
	echo '削除できませんでした。';
}
?>
<br>
<br>
<input type="button" onclick="location.href='./course_list.php'" value="リストに戻る">
