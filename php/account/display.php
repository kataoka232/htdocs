<?php require '../header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8','teacher', 'password');
foreach ($pdo->query('select * from account') as $row) {
	echo '<p>';
	echo $row['id'], ':';
	echo $row['name'], ':';
	echo $row['password'];
	echo '</p>';
}
?>
<?php require '../footer.php'; ?>
