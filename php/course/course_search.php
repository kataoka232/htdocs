<?php require '../menu.php'; ?>

<h1>コース検索</h1>
<form action="course_search.php" method="post">
コースID：<input type="text" name="id">
コース名：<input type="text" name="name">
<input type="submit" value="検索">
</form><br>

<table>
<tr><th>コースID</th><th>コース名</th></tr>
<?php
$pdo = new PDO ('mysql:host=localhost;dbname=juku;charset=utf8','root');
if (!empty($_REQUEST['id'])) 
{
	$sql = $pdo->prepare('select * from courseid where id like :id and delete_flg is null');
	$sql->bindValue(':id',$_REQUEST['id'],PDO::PARAM_INT);
	$sql->execute();
} else if (!empty($_REQUEST['name'])) 
{
	$sql = $pdo->prepare('select * from courseid where name like :name and delete_flg is null');
	$sql->bindValue(':name','%'.$_REQUEST['name'].'%',PDO::PARAM_STR);
	$sql->execute();
}
if (!empty($_REQUEST['id']) && !empty($_REQUEST['name'] )) 
{
	$sql = $pdo->prepare('select * from courseid where id like :id and name like :name and delete_flg is null');
	$sql->bindValue(':id',$_REQUEST['id'],PDO::PARAM_INT);
	$sql->bindvalue(':name','%'.$_REQUEST['name'].'%',PDO::PARAM_STR);
	$sql->execute();
}
if (empty($_REQUEST['id']) && empty($_REQUEST['name'] )) 
{
	$sql = $pdo->prepare('select * from courseid where delete_flg is null');
	$sql->execute();
}

foreach ($sql as $course) {
	echo '<tr>';
	echo '<td>',$course['id'],'</td>';
	echo "\t";
	echo '<td>',$course['name'],'</td>';
	echo '</tr>';
	echo "\n";
}
?>
</table>
<br>
<br>
<input type="button" onclick="location.href='./course_list.php'" value="リストに戻る">