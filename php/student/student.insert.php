
<table>
<tr><th>生徒検索</th></tr>

<form action="student.insert.php" method="post">

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
		<td><input type="submit" value="登録"></td>
	</tr>

</form>
<?php



//配列設定
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
} elseif(empty($_REQUEST["address"]))
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
//IDが入っていたら
if(!empty($_REQUEST["id"])){
	$bind[]=$_REQUEST["id"];	
} 
//コースが選択されていたら
if(!empty($_REQUEST["course"])){
	$bind["course_id"]=$_REQUEST["course"];
}
//性別が選択されていたら
if(!empty($_REQUEST["sex"])){
	$bind["sex"]=$_REQUEST["sex"];
}

	print_r('<pre>');
	print_r($bind);
	print_r('</pre>');


if(empty($_REQUEST["course"])){

echo "登録に失敗しました";
}else{
$sql = $pdo->prepare("insert into student(academicyear,address,birthday,course_id,emargencycontact,furigananame,name,sex,tel) 
values(:academicyear,:address,:birthday,:course_id,:emargencycontact,:furigananame,:name,:sex,:tel)");
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
</table>

