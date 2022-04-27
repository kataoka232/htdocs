<?php
//オブジェクト作成

$pdo=new PDO("mysql:host=localhost;dbname=juku;charset=utf8","root","");
$bind=$_REQUEST;
var_dump($bind);
$select=$pdo->prepare("select * from student where studentid=?");
//$select->bindValue(":studentid",$bind["1"],PDO::PARAM_STR);
$select->execute($bind);
$result=$select->fetchAll();
foreach( $result as $row)
	{
		echo <<<std
		<tr>
		<form>
		<td><a href=student.edit.php?$row[studentid]>$row[studentid]</a></td>	
		<td>$row[name]</td>
		<td>$row[furigananame]</td>
		<td>$row[address]</td>
		<td>$row[tel]</td>
		<td>$row[emargencycontact]</td>
		<td>$row[academicyear]</td>
		<td>$row[birthday]</td>
		
		</tr>

		std;

			}

//echo print_r($result,true);

?>














?>
