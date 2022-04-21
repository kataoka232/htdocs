<p>コース検索</p>
<table>
<?php
$pdo = new PDO ('mysql:host=localhost;dbname=juku;charset=utf8','root');
$sql = $pdo->prepare('select * from courseid where name like %:name%');
$sql->bindValue (':name',$_REQUEST['name'],PDO::PARAM_STR);
$sql->execute();

foreach ($sql as $course) {
	echo '<tr>';
	echo '<td>',$course['id'],'</td>';
	echo "\t";
	echo '<td>',$course['name'],'</td>';
	echo '</tr>';
	echo '\n";
}
?>
</table>
