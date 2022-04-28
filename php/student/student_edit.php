<table>

<form action="student_edit.php" method="post">

<?php
//オブジェクト作成

$pdo=new PDO("mysql:host=localhost;dbname=juku;charset=utf8","root","");
//var_dump($_REQUEST);
$select=$pdo->prepare("select * from student where studentid=:studentid");
$select->bindValue(":studentid",$_REQUEST["id"],PDO::PARAM_STR);
//$select->bindValue($_REQUEST["id"], PDO::PARAM_INT);
$select->execute();
//var_dump($select);
$person=$select->fetch(PDO::FETCH_ASSOC);
//var_dump($person);

/*echo print_r("<pre>");
echo print_r($person, true);
echo print_r("</pre>");*/




?>
	<tr><th>
	名前
	<td><input type="text" name="name"
	value=
	"<?php  echo ($person['name']); ?>"></td>
	</th></tr>

	<tr><th>
	フリガナ
	<td><input type="text" name="furigana"
	value=
	"<?php echo $person['furigananame']; ?>"></td>
	</tr></th>

	<tr><th>
	住所
	<td><input type="text" name="address"
	value=
	"<?php echo $person['address']; ?>"></td>
	</tr></th>

	<tr><th>
	電話
	<td><input type="text" name="tel"
	value=
	"<?php echo $person['tel']; ?>"></td>
	</tr></th>

	<tr><th>
	緊急連絡先
	<td><input type="text" name="emargency"
	value=
	"<?php  echo $person['emargencycontact']; ?>"></td>
	</tr></th>

	<tr><th>学年
	<td><input type="text" name="year"
	value=
	"<?php  echo $person['academicyear']; ?>"></td>
	</tr></th>

	<tr><th>
	性別
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
		if($person['sex']==$row["sexid"]){
		echo "<option value='".$row['sexid']."'selected>".$row['name']."</option>";
		}else{
		echo "<option value='".$row['sexid']."'>".$row['name']."</option>";}

	}
	
	?>
	</select>
	</td>
	</th></tr>

	<tr><th>
	生年月日
	<td><input type="date" name="birthday"
	value=
	"<?php echo $person['birthday']; ?>"></td>
	</tr></th>

	<tr><th>
	ID
	<td><input type="text" name="id"
	value=
	"<?php  echo $person['studentid']; ?>"></td>
	</tr></th>

	<tr><th>
	受講コース
	<td>

	<select name="course">
	<?php
	$select=$pdo->prepare("SELECT * FROM courseid");
	$select->execute();//sql文実行
	$result=$select->fetchAll();
	echo "<option value=''></option>";	
	foreach( $result as $row)
	{	
		if($person['course_id']==$row['id']){
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
		<td><input type="submit" value="変更"></td>
	</tr>

</form>


<?php
print_r('<pre>');
	print_r($_REQUEST);
	print_r('</pre>');
$bind=["0"=>"name","1"=>"furigananame","2"=>"address","3"=>"tel","4"=>"emargencycontact","5"=>"academicyear",
"6"=>"birthday","7"=>"course_id","8"=>"sex"];
//名前テキストボックスが入っていたら
if(!empty($_REQUEST["name"])){
	$bind["name"]=$_REQUEST["name"];
}elseif(empty($_REQUEST["name"]))
{
$bind["name"]=NULL; 
}
//フリガナテキストボックスが入っていたら
if(!empty($_REQUEST["furigana"])){
	$bind["furigananame"]=$_REQUEST["furigana"];
}elseif(empty($_REQUEST["furigana"]))
{
$bind["furigananame"]=NULL; 
}
//住所テキストボックスが入っていたら
if(!empty($_REQUEST["address"])){
	$bind["address"]=$_REQUEST["address"];
} elseif(empty($_bind["address"]))
{
$bind["address"]=NULL;
}
//電話番号が入っていたら
if(!empty($_REQUEST["tel"])){
	$bind["tel"]=$_REQUEST["tel"];
} elseif(empty($_REQUEST["tel"]))
{
$bind["tel"]=NULL;
} 
//緊急連絡先が入っていたら
if(!empty($_REQUEST["emargency"])){
	$bind["emargencycontact"]=$_REQUEST["emargency"];
} elseif(empty($_REQUEST["emargency"]))
{
$bind["emargencycontact"]=NULL;
} 
//学年が入っていたら
if(!empty($_REQUEST["year"])){
	$bind["academicyear"]=$_REQUEST["year"];
} elseif(empty($_REQUEST["year"]))
{
$bind["academicyear"]=NULL;
} 
//生年月日が入力されていたら
if(!empty($_REQUEST["birthday"])){
	$bind["birthday"]=$_REQUEST["birthday"];
}elseif(empty($_REQUEST["birthday"])){
$bind["birthday"]=NULL;
}
//コースが選択されていたら
if(!empty($_REQUEST["course"])){
	$bind["course_id"]=$_REQUEST["course"];
}
//性別が選択されていたら
if(!empty($_REQUEST["sex"])){
	$bind["sex"]=$_REQUEST["sex"];
}

	


if(empty($_REQUEST["course"])){

echo "登録に失敗しました";
}else{
$sql = $pdo->prepare('UPDATE student SET academicyear=:academicyear,address=:address,birthday=:birthday,course_id=:course_id,emargencycontact=:emargencycontact,
furigananame=:furigananame,name=:name,sex=:sex,tel=:tel where studentid=:studentid');
$sql->bindValue(":studentid",$_REQUEST["id"],PDO::PARAM_STR);
$sql->bindValue(":name",$bind["name"],PDO::PARAM_STR);
$sql->bindValue(":furigananame",$bind["furigananame"],PDO::PARAM_STR);
$sql->bindValue(":address",$bind["address"],PDO::PARAM_STR);
$sql->bindValue(":tel",$bind["tel"],PDO::PARAM_STR);
$sql->bindValue(":emargencycontact",$bind["emargencycontact"],PDO::PARAM_STR);
$sql->bindValue(":academicyear",$bind["academicyear"],PDO::PARAM_STR);
$sql->bindValue(":birthday",$bind["birthday"],PDO::PARAM_STR);
$sql->bindValue(":course_id",$bind["course_id"],PDO::PARAM_STR);
$sql->bindValue(":sex",$bind["sex"],PDO::PARAM_STR);
$sql->execute();
}


?>













