<?php
$pdo=new PDO("mysql:host=localhost;dbname=juku;charset=utf8","root","");
$select=$pdo->prepare("select * from student where studentid=?");
$select->execute([$_REQUEST["id"]]);
foreach( $select as $row)
	{
		echo "<p>";
		echo $row['studentid'], ":";	
		echo $row['course_id'], ":";
		echo $row['name'];
		echo "</p>";
	}
?>
