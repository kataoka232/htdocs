<?php require '../menu.php'; ?>

<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8','root');
if(!empty($_POST['id'])){
$sql=$pdo->prepare('select * from account where id = ?');
$sql->execute([$_REQUEST['id']]);
		foreach ($sql as $account) {
			echo '<p>削除しますか？</p>';
			echo '<form action="delete2.php" method="post">';
			echo '<input type="hidden" name="id" value="',$account['id'],'">';
			echo '<input type="hidden" name="name" value="',$account['name'],'">';
			echo 'アカウントID：',$account['id'];
			echo '<br>';
			echo "\t";
			echo 'アカウント名：',$account['name'];
			echo '<br>';
			echo '<br>';
			echo '<input type="button" onclick="history.back()" value="戻る">','&emsp;';
			echo "\t";
			echo '<input type="submit" value="削除">','<br>';
			echo '</form>';
		}   
}           else {
            echo 'アカウントが登録されていません。';
            echo '<input type="button" onclick="history.back()" value="戻る">','<br>';
            }
?>
<input type="button" onclick="location.href='./list.php'" value="リストに戻る">
