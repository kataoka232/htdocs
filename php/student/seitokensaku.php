
<table>
<tr><th>生徒検索</th></tr>

<form action="seitokensaku.php" method="post">

<?php
//オブジェクト作成
$pdo=new PDO("mysql:host=localhost;dbname=juku;charset=utf8","root","");
?>
	<tr><th>
	名前//テキストボックス
	<td><input type="text" name="name"
	value=
	"<?php if( !empty($_POST['name']) ){ echo $_POST['name']; } ?>"></td>
	</th></tr>

	<tr><th>
	フリガナ//テキストボックス
	<td><input type="text" name="furigana"
	value=
	"<?php if( !empty($_POST['furigana']) ){ echo $_POST['furigana']; } ?>"></td>
	</tr></th>

	<tr><th>
	住所//テキストボックス
	<td><input type="text" name="address"
	value=
	"<?php if( !empty($_POST['address']) ){ echo $_POST['address']; } ?>"></td>
	</tr></th>

	<tr><th>
	電話//テキストボックス
	<td><input type="text" name="tel"
	value=
	"<?php if( !empty($_POST['tel']) ){ echo $_POST['tel']; } ?>"></td>
	</tr></th>

	<tr><th>
	緊急連絡先//テキストボックス
	<td><input type="text" name="emargency"
	value=
	"<?php if( !empty($_POST['emargency']) ){ echo $_POST['emargency']; } ?>"></td>
	</tr></th>

	<tr><th>学年//テキストボックス
	<td><input type="text" name="year"
	value=
	"<?php if( !empty($_POST['year']) ){ echo $_POST['year']; } ?>"></td>
	</tr></th>

	<tr><th>
	性別//セレクトボックス
	<td>
	
	<select name="sex">
	<?php
	$select=$pdo->prepare("select * from sex");
	$select->execute();
	$result=$select->fetchAll();
	//var_dump($result);
	echo "<option value=''></option>";	
	foreach( $result as $row)
	{	
		if($_REQUEST['sex']==$row["sexid"]){
		echo "<option value='".$row['sexid']."'selected>".$row['name']."</option>";
		}else{
		echo "<option value='".$row['sexid']."'>".$row['name']."</option>";}

	}
	
	?>
	</select>
	</td>
	</th></tr>

	<tr><th>
	生年月日//セレクトボックス
	<td><input type="date" name="birthday"
	value=
	"<?php if( !empty($_POST['birthday']) ){echo $_POST['birthday'];
		 } ?>"></td>
	</tr></th>

	<tr><th>
	ID//テキストボックス
	<td><input type="text" name="id"
	value=
	"<?php if( !empty($_POST['id']) ){ echo $_POST['id'];}
	 ?>"></td>
	</tr></th>

	<tr><th>
	受講コース//セレクトボックス
	<td>

	<select name="course">
	<?php
	$select=$pdo->prepare("SELECT * FROM courseid");
	$select->execute();//sql文実行
	$result=$select->fetchAll();
	echo "<option value=''></option>";	
	foreach( $result as $row)
	{	
		if($_REQUEST['course']==$row['id']){
		echo "<option value='".$row['id']."'selected>".$row['name']."</option>";
		}else{
		echo "<option value='".$row['id']."'>".$row['name']."</option>";
		}
                
	}
	
	?>
	</select>
	</td>
	</th></tr>

	<tr><th></th>
		<td><input type="submit" value="検索"></td>
	</tr>

</form>
<?php

$sql=("select * from student where delete_flag=0");
$bind=[];
//名前テキストボックスが入っていたら
if(!empty($_REQUEST["name"])){
	$sql.=" and name like ?";
	$bind[]='%'.$_REQUEST["name"].'%';

} 
//フリガナテキストボックスが入っていたら
if(!empty($_REQUEST["furigana"])){
	$sql.=" and furigananame like ?";
	$bind[]='%'.$_REQUEST["furigana"].'%';
} 
//住所テキストボックスが入っていたら
if(!empty($_REQUEST["address"])){
	$sql.=" and address like ?";
	$bind[]='%'.$_REQUEST["address"].'%';
} 
//電話番号が入っていたら
if(!empty($_REQUEST["tel"])){
	$sql.=" and tel=?";
	$bind[]=$_REQUEST["tel"];
} 
//緊急連絡先が入っていたら
if(!empty($_REQUEST["emargency"])){
	$sql.=" and emargencycontact=?";
	$bind[]=$_REQUEST["emargency"];
} 
//学年が入っていたら
if(!empty($_REQUEST["year"])){
	$sql.=" and academicyear=?";
	$bind[]=$_REQUEST["year"];
} 
//生年月日が入力されていたら
if(!empty($_REQUEST["birthday"])){
	$sql.=" and birthday=?";
	$bind[]=$_REQUEST["birthday"];
} 
//IDが入っていたら
if(!empty($_REQUEST["id"])){
	$sql.=" and studentid=?";
	$bind[]=$_REQUEST["id"];	
} 
//コースが選択されていたら
if(!empty($_REQUEST["course"])){
	$sql.=" and course_id=?";
	$bind[]=$_REQUEST["course"];
}
//性別が選択されていたら
if(!empty($_REQUEST["sex"])){
	$sql.=" and sex=?";
	$bind[]=$_REQUEST["sex"];
}

//var_dump($sql);
$sql = $pdo->prepare($sql);
$sql->execute($bind);
$result=$sql->fetchAll();

$sex=$pdo->prepare("select * from sex");
	$sex->execute();
	$sexresult=$sex->fetchAll();

$course=$pdo->prepare("SELECT * FROM courseid");//オブジェクト作成
	$course->execute();//sql文実行
	$courseresult=$course->fetchAll();


foreach( $result as $row)
	{
		echo <<<std
		<tr>
		<td><a href="student_edit.php?$row[studentid]">$row[studentid]</a></td>	
		<td>$row[name]</td>
		<td>$row[furigananame]</td>
		<td>$row[address]</td>
		<td>$row[tel]</td>
		<td>$row[emargencycontact]</td>
		<td>$row[academicyear]</td>
		<td>$row[birthday]</td>
		
		</tr>

		std;

		
		foreach( $sexresult as $srow){
			if($row["sex"]==$srow["sexid"]){
			echo '<td>', $srow["name"] ,'</td>';
			}
		}
		
		foreach( $courseresult as $crow){
			if($row["course_id"]==$crow["id"]){
			echo '<td>', $crow["name"] ,'</td>';
			}
		}
		

	}

//echo print_r($result,true);

?>
<form action="student_insert.php" method="post">
	<tr><th></th>
		<td><input type="submit" value="新規登録"></td>
	</tr>
</table>
