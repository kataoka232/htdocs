<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8','root');
$sql=$pdo->prepare('select * from account where id = ?');
$sql->execute([$_REQUEST['id']]);
foreach ($sql as $account) {
	echo '<p>�폜���܂����H</p>';
	echo '<form action="delete2.php" method="post">';
	echo '<input type="hidden" name="id" value="',$account['id'],'">';
	echo '<input type="hidden" name="name" value="',$account['name'],'">';
	echo '�A�J�E���gID�F',$account['id'];
	echo '<br>';
	echo "\t";
	echo '�A�J�E���g���F',$account['name'];
	echo '<br>';
	echo '<br>';
	//echo '<input type="button" onclick="history.back()" value="�߂�">';
	echo "\t";
	echo '<input type="submit" value="�폜">';
	echo '</form>';
}
?>
