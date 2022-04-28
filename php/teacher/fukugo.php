<?php require '../menu.php'; ?>
<?php require 'menu.php';?>
<p>講師検索</p>
<form action='fukugo.php' method='post' >
<br>名前<input type='text' name='name' value=
"<?php if( !empty($_REQUEST['name']) ){echo $_REQUEST['name'];
} ?>"></br>
<br>フリガナ<input type='text' name='furigananame' value=
"<?php if( !empty($_REQUEST['furigananame']) ){echo $_REQUEST['furigananame'];
} ?>"></br>
<br>住所<input type='text'  name='address' value=
"<?php if( !empty($_REQUEST['address']) ){echo $_REQUEST['address'];
} ?>"></br>
<br>電話<input type='text'  name='tel'value=
"<?php if( !empty($_REQUEST['tel']) ){echo $_REQUEST['tel'];
} ?>"></br>
<br>緊急連絡先<input type='text' name='emergencycontact'value=
"<?php if( !empty($_REQUEST['emergencycontact']) ){echo $_REQUEST['emergencycontact'];
} ?>"></br>
<br>年齢<input type='text' name='age' value=
"<?php if( !empty($_REQUEST['age']) ){echo $_REQUEST['age'];
} ?>"></br>
<br>性別<select name='sex' value=
"<?php if( !empty($_REQUEST['sex']) ){echo $_REQUEST['sex'];
} ?>"></br>
<option value=""></option>
<option value='1'>男</option>
<option value='2'>女</option>
<br></select></br>
<br>生年月日
<input type="date" name="birthday" value=
"<?php if( !empty($_POST['birthday']) ){echo $_POST['birthday'];
} ?>"></br>
<br>ID<input type='text' name='id' value=
"<?php if( !empty($_REQUEST['id']) ){echo $_REQUEST['id'];
} ?>"></br>
<br>担当科目<select name='domain' value=
"<?php if( !empty($_REQUEST['domain']) ){echo $_REQUEST['domain'];
} ?>"></br>
<option></option>
<option value='1'>国語</option>
<option value='2'>数学</option>
<option value='3'>社会</option>
<option value='4'>英語</option>
<option value='5'>理科</option>
<br></select></br>
<br><input type='submit' value='確定'><br>
</form>

<?php
$dbh=new PDO('mysql:host=localhost;dbname=juku;charset=utf8', 'root', '');
$sql = "select * from teacher where delete_flg = 0";
$data=[];

if(!empty($_REQUEST["name"])){
	$sql.=" and name like ?";
	$data[]='%'.$_REQUEST["name"].'%';
      
}
if(!empty($_REQUEST["furigananame"])){
	$sql.=" and furigananame like ?";
	$data[]='%'.$_REQUEST["furigananame"].'%';
      
}
if(!empty($_REQUEST["address"])){
	$sql.=" and address like ?";
	$data[]='%'.$_REQUEST["address"].'%';
} 
if(!empty($_REQUEST["tel"])){
	$sql.=" and tel like ?";
	$data[]='%'.$_REQUEST["tel"].'%';
}
if(!empty($_REQUEST["emergencycontact"])){
	$sql.=" and emergencycontact like ?";
	$data[]='%'.$_REQUEST["emergencycontact"].'%';
}
if(!empty($_REQUEST["age"])){
	$sql.=" and age like ?";
	$data[]='%'.$_REQUEST["age"].'%';
}
if(!empty($_REQUEST["sex"])){
	$sql.=" and sex like ?";
	$data[]='%'.$_REQUEST["sex"].'%';
}
if(!empty($_REQUEST["birthday"])){
	$sql.=" and birthday like ?";
	$data[]='%'.$_REQUEST["birthday"].'%';
}
if(!empty($_REQUEST["id"])){
	$sql.=" and teacherid like ?";
	$data[]='%'.$_REQUEST["id"].'%';
}
if(!empty($_REQUEST["domain"])){
	$sql.=" and domain like ?";
	$data[]='%'.$_REQUEST["domain"].'%';
}
$sql = $dbh->prepare($sql);
$sql->execute($data);
$result=$sql->fetchAll(PDO::FETCH_ASSOC);

$teacher_obj=$dbh->prepare('SELECT * FROM teacher');
$sex_obj=$dbh->prepare('SELECT * FROM sex');
$domain_obj=$dbh->prepare('SELECT * FROM subject');
$teacher_obj -> execute();
$sex_obj     -> execute();
$domain_obj  -> execute();

$teacher_list = $teacher_obj->fetchAll(PDO::FETCH_ASSOC);
$sex_list     = $sex_obj->fetchAll(PDO::FETCH_ASSOC);
$domain_list  = $domain_obj->fetchAll(PDO::FETCH_ASSOC);

   
foreach ($result as $teacher){
    echo '<p>';
    echo '<tr>';
    echo '<td>',$teacher['teacherid'],'</td>';
    echo '<td>',$teacher['name'],'</td>';
    echo '<td>',$teacher['furigananame'],'</td>';
    echo '<td>',$teacher['address'],'</td>';
    echo '<td>',$teacher['tel'],'</td>';
    echo '<td>',$teacher['emergencycontact'],'</td>';
    echo '<td>',$teacher['age'],'</td>';
        foreach ($sex_list as $sex) {
		    if ($teacher['sex']==$sex['id']) {
		        echo '<td>',$sex['name'] ,'</td>';
		    }
	    }
	echo '<td>',$teacher['birthday'],'</td>';
        foreach ($domain_list as $subject) {
            if ($teacher['domain']==$subject['id']) {
                echo '<td>',$subject['name'],'</td>';
            }
        }
    echo '</tr>';
    echo '</p>';
}
?>
