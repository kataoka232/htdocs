<table>
<tr><th></th></tr>
<tr><td></td></tr>

<tr><th>生徒検索</th></tr>
<form action="seitokensaku.php" method="post">
	<tr><th>
	名前
	<td><input type="text" name="name"></td>
	</th></tr>

	<tr><th>
	フリガナ
	<td><input type="text" name="furigana"></td>
	</tr></th>

	<tr><th>
	住所
	<td><input type="text" name="address"></td>
	</tr></th>

	<tr><th>
	電話
	<td><input type="text" name="tell"></td>
	</tr></th>

	<tr><th>
	緊急連絡先
	<td><input type="text" name="emargency"></td>
	</tr></th>

	<tr><th>学年
	<td><input type="text" name="year"></td>
	</tr></th>

	<tr><th>
	性別
	<td>
	
	<select name="sex">
	<?php
	$pdo=new PDO("mysql:host=localhost;dbname=juku;charset=utf8","root","");
	
	$select=$pdo->prepare("select * from sex ");
	$select->execute();

	$result=$select->fetchAll();	

	foreach( $result as $row)
	{
		
		echo "<option value='".$row['name']."'>".$row['name']."</option>";
		
	}
	
	?>
	</select>
	</td>
	</tr></th>

	<tr><th>
	生年月日
	<td><input type="date" name="birthday"></td>
	</tr></th>

	<tr><th>
	ID
	<td><input type="text" name="id"></td>
	</tr></th>

	<tr><th>
	受講コース
	<td>
	<select name="course">
	<?php
	$pdo=new PDO("mysql:host=localhost;dbname=juku;charset=utf8","root","");
	
	$select=$pdo->prepare("SELECT * FROM courseid  ");
//SELECT * FROM table1 INNER JOIN table2 ON table1.id = table2.id;
	$select->execute();

	$result=$select->fetchAll();	

	foreach( $result as $row)
	{
		
		echo "<option value='".$row['name']."'>".$row['name']."</option>";
		
	}
	
	?>
	</select>
	</th></tr>

	<tr><th></th>
		<td><input type="submit" value="検索"></td>
	</tr>

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
/*foreach( $result as $row)
	{
		echo"<tr>";	
		echo "<td>",$row['name'],"</td>";
		echo "<td>",$row['furigananame'],"</td>";
		echo "<td>",$row['address'],"</td>";
		echo "<td>",$row['tel'],"</td>";
		echo "<td>",$row['emargencycontact'],"</td>";
		echo "<td>",$row['academicyear'],"</td>";
		echo "<td>",$row['sex'], ":","</td>";
		echo "<td>",$row['birthday'],"</td>";
		echo "<td>",$row['studentid'], ":","</td>";
		echo "<td>",$row['course_id'],"</td>";
		echo "</tr>";

	
	}*/

foreach( $result as $row)
	{
		echo <<<std
		<tr>	
		<td>$row[name]</td>
		<td>$row[furigananame]</td>
		<td>$row[address]</td>
		<td>$row[tel]</td>
		<td>$row[emargencycontact]</td>
		<td>$row[academicyear]</td>
		<td>$row[sex]:</td>
		<td>$row[birthday]</td>
		<td>$row[studentid]:</td>
		<td>$row[course_id]</td>
		</tr>

		std;
	}

//echo print_r($result,true);

?>
</table>

