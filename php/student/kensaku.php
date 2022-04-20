
<table>
<tr><th>生徒IDを入力してください</tr></th>

<form action="kensaku.php" method="post">
	<tr><td>
		<input type="text"name="id">
		<input type="submit"value="検索">
	</tr></td>

<tr><th>選択コースを選んでください</tr></th>
	<tr><td>
		<input type="text"name="course">
		<input type="submit"value="検索">
	</tr></td>
</form>

<?php

//error_reporting(0);

$pdo=new PDO("mysql:host=localhost;dbname=juku;charset=utf8","root","");
if(!empty($_REQUEST["id"]))
	{
		$select=$pdo->prepare("select * from student where studentid=:studentid");
		$select->bindValue(":studentid",$_REQUEST["id"],PDO::PARAM_STR);
		$select->execute();
}else if(!empty($_REQUEST["course"]))
	{
		$select=$pdo->prepare("select * from student where course_id=:course_id");
		$select->bindValue(":course_id",$_REQUEST["course"],PDO::PARAM_STR);
		$select->execute();
	
}else if(empty($_REQUEST["course"])&&empty($_REQUEST["id"]))
	{	
		$sql = "select * from student where delete_flag = 0";
		$select=$pdo->prepare($sql);
		$select->execute();	
	
		/*$select=$pdo->prepare("select * from student");
		$select->bindValue(":student",null,PDO::PARAM_NULL);
		$select->execute();*/
	}

$result=$select->fetchAll();
//var_dump($_REQUEST["course"]);
foreach( $result as $row)
	{
		echo"<tr>";
		echo "<td>",$row['studentid'], ":","</td>";	
		echo "<td>",$row['course_id'], ":","</td>";
		echo "<td>",$row['name'],"</td>";
		echo "</tr>";

	
	}

//echo print_r($result,true);

?>
</table>
