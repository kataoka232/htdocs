<?php
$pdo = new PDO('mysql:host=localhost;dbname=juku;charset=utf8','root');
$sql = $pdo->prepare('insert into courseid (name) values (:name)');
$sql->bindValue(':name',$_REQUEST['name'],PDO::PARAM_STR);
$sql->execute();

if (empty($_REQUEST['name'])) {
	echo 'コース名を入力してください';
} else
if ($sql)
{
	echo '登録完了しました。';
} else {
	echo '登録できませんでした。';
}
?>
<br>
<input type="button" onclick="location.href='./course_list.php'" value="リストに戻る">
