<?php require '../menu.php'; ?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=juku;charset=utf8','root');
$sql = $pdo->prepare ('select count(name) from account where name=:name');
$sql->bindValue(':name',$_REQUEST['name'],PDO::PARAM_STR);
$sql->execute();
$result = $sql->fetch();

if (empty($_REQUEST['name'] )) {
	echo '名前を入力してください。';
} else
if ($result < 0) {
	echo 'すでに登録されています';
} else {
	$stmt = $pdo->prepare('update account set name=:name, password=:password where id=:id');
	$stmt->bindValue (':name',$_REQUEST['name'],PDO::PARAM_STR);
    $stmt->bindValue (':password',$_REQUEST['password'],PDO::PARAM_STR);
	$stmt->bindValue (':id',$_REQUEST['id'],PDO::PARAM_INT);
	$stmt->execute();
	echo '更新しました。';
} 
?>
<br>
<br>
<input type="button" onclick="location.href='./list.php'" value="リストに戻る">
