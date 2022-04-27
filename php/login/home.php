<?php session_start();?>
<?php
unset($_SESSION['user']);
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8','root');
$sql=$pdo->prepare('select * from account where name=? and password=?');
$sql->execute([$_REQUEST['name'], $_REQUEST['password']]);
foreach ($sql as $item) {
	$_SESSION['user']=[
		'name'=>$item['name'],
		'password'=>$item['password']];
}
if (isset($_SESSION['user'])){
	echo 'ようこそ', $_SESSION['user']['name'],'さん';
} else {
	echo 'パスワードが違うかユーザー登録されていません。';
}
?>
<?php require '../footer.php'; ?>