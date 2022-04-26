<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8','root');
$sql=$pdo->prepare('update account set delete_flg=1 where id=:id');
$sql->bindValue(':id',$_REQUEST['id'],PDO::PARAM_INT);
if ($sql->execute()) {
	echo '削除しました。';
} else {
	echo '削除できませんでした。';
}
?>
<br>
<br>
//<input type="button" onclick="location.href='./course_list.php'" value="リストに戻る">
