<?php
$pdo = new PDO('mysql:host=localhost;dbname=juku;charset=utf8','root');
$sql = $pdo->prepare ('select * from courseid where name=?');
$bind = $sql->bindValue (':name',$_REQUEST['name'],PDO::PARAM_STR);
$bind->execute();
//$resuld = $bind->fetch();

$sql=$pdo->prepare ('update courseid set name=? where id=?');
$sql->bindValue (':name',$_REQUEST['name'],PDO::PARAM_STR);
$sql->bindValue (':id',$_REQUEST['id'],PDO::PARAM_INT);

if (empty($_REQUEST['name'] )) {
	echo 'コース名を入力してください。';
} else
if (empty($bind->fetchAll() )) {
	if (isset($_REQUEST['id'])) {
		$sql->execute()
		echo '更新しました。';
	} else {
	echo '更新できませんでした。';
	}
}
?>
<br>
<br>
<input type="button" onclick="location.href='./course_list.php'" value="リストに戻る">
