//error_reporting(0);
<table>
<tr><th>生徒検索</th></tr>

<form action="sisaku.php" method="post">

<?php
//オブジェクト作成
$pdo=new PDO("mysql:host=localhost;dbname=juku;charset=utf8","root","");
?>
	<tr><th>
	名前//テキストボックス
	<td><input type="text" name="name"></td>
	</th></tr>

	<tr><th>
	フリガナ//テキストボックス
	<td><input type="text" name="furigana"></td>
	</tr></th>

	<tr><th>
	住所//テキストボックス
	<td><input type="text" name="address"></td>
	</tr></th>

	<tr><th>
	電話//テキストボックス
	<td><input type="text" name="tel"></td>
	</tr></th>

	<tr><th>
	緊急連絡先//テキストボックス
	<td><input type="text" name="emargency"></td>
	</tr></th>

	<tr><th>学年//テキストボックス
	<td><input type="text" name="year"></td>
	</tr></th>

	<tr><th>
	性別//セレクトボックス
	<td>
	
	<select name="sex">
	<?php
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
	生年月日//セレクトボックス
	<td><input type="date" name="birthday"></td>
	</tr></th>

	<tr><th>
	ID//テキストボックス
	<td><input type="text" name="id"></td>
	</tr></th>

	<tr><th>
	受講コース//セレクトボックス
	<td>
	<select name="course">
	<?php
	$select=$pdo->prepare("SELECT * FROM courseid  ");
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
//名前テキストボックスが入っていたら
if(!empty($_REQUEST["name"])){

		$select=$pdo->prepare("select * from student where name like :name");
		$select->bindValue(":name",'%'.$_REQUEST["name"].'%',PDO::PARAM_STR);
		$select->execute();
		} 
//フリガナテキストボックスが入っていたら
elseif(!empty($_REQUEST["furigana"])){

		$select=$pdo->prepare("select * from student where furigananame like :furigana");
		$select->bindValue(":furigana",'%'.$_REQUEST["furigana"].'%',PDO::PARAM_STR);
		$select->execute();
		} 
//住所テキストボックスが入っていたら
elseif(!empty($_REQUEST["address"])){

		$select=$pdo->prepare("select * from student where address like :address");
		$select->bindValue(":address",'%'.$_REQUEST["address"].'%',PDO::PARAM_STR);
		$select->execute();
		} 
//電話番号が入っていたら
elseif(!empty($_REQUEST["tel"])){

		$select=$pdo->prepare("select * from student where tel=:tel");
		$select->bindValue(":tel",$_REQUEST["tel"],PDO::PARAM_STR);
		$select->execute();
		} 
//緊急連絡先が入っていたら
elseif(!empty($_REQUEST["emargency"])){

		$select=$pdo->prepare("select * from student where emargencycontact=:emargencycontact");
		$select->bindValue(":emargencycontact",$_REQUEST["emargency"],PDO::PARAM_STR);
		$select->execute();
		} 
//学年が入っていたら
elseif(!empty($_REQUEST["year"])){

		$select=$pdo->prepare("select * from student where acaademicyear=:acaademicyear");
		$select->bindValue(":acaademicyear",$_REQUEST["acaademicyear"],PDO::PARAM_STR);
		$select->execute();
		} 
//生年月日が入力されていたら
elseif(!empty($_REQUEST["birthday"])){

		$select=$pdo->prepare("select * from student where birthday like :birthday");
		$select->bindValue(":birthday",'%'.$_REQUEST["birthday"].'%',PDO::PARAM_STR);
		$select->execute();
		} 
//IDが入っていたら
elseif(!empty($_REQUEST["id"]))
	{
		$select=$pdo->prepare("select * from student where studentid=:studentid");
		$select->bindValue(":studentid",$_REQUEST["id"],PDO::PARAM_STR);
		$select->execute();
	} 
//コースが選択されていたら
elseif(!empty($_REQUEST["course"]))
	{
		$select=$pdo->prepare("select * from student where course_id=:course_id");
		$select->bindValue(":course_id",$_REQUEST["course"],PDO::PARAM_STR);
		$select->execute();
	
	} 
//性別が選択されていたら
elseif(!empty($_REQUEST["sex"]))
	{
		$select=$pdo->prepare("select * from student where sex=:sex");
		$select->bindValue(":sex",$_REQUEST["sex"],PDO::PARAM_STR);
		$select->execute();
	
	}
//どちらも空だったら
else if(empty($_REQUEST["name"])&&empty($_REQUEST["id"]))
	{	
		$sql= "select * from student where delete_flag = 0";
		$select=$pdo->prepare($sql);
		$select->execute();	
	
		
	}

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
		<td>$row[sex]:</td>
		<td>$row[birthday]</td>
		<td>$row[studentid]:</td>
		<td>$row[course_id]</td>
		</tr>

		std;
	}

echo print_r($result,true);

?>
</table>
