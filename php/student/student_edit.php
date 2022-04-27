<?php
//オブジェクト作成

$pdo=new PDO("mysql:host=localhost;dbname=juku;charset=utf8","root","");
$bind=$_REQUEST;
//var_dump($bind);
$select=$pdo->prepare("select * from student where studentid=?");
//$select->bindValue(":studentid",$bind["1"],PDO::PARAM_STR);
$select->bindValue(1,$bind, PDO::PARAM_INT);
$select->execute();
var_dump($select);
$result=$select->fetchAll();
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
		<td>$row[birthday]</td>
		
		</tr>

		std;

			}

//echo print_r($result,true);

?>














?>
