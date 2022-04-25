<p>講師検索</p>
<form action='fukusu.php' method='post'>
<br>名前<input type='text' name='name'></br>
<br>フリガナ<input type='text' name='furigananame'></br>
<br>住所<input type='text'  name='address'></br>
<br>電話<input type='text'  name='tel'></br>
<br>緊急連絡先<input type='text' name='emergencycontact'></br>
<br>年齢<input type='text' name='age'></br>
<br>性別<select name='sex'></br>
<option value=""></option>
<option value='1'>男</option>
<option value='2'>女</option>
<br></select></br>
<br>生年月日
<input type="date" name="birthday" value=
"<?php if( !empty($_POST['birthday']) ){echo $_POST['birthday'];
} ?>"></br>
<br>ID<input type='text' name='id'></br>
<br>担当科目<select name='domain'></br>
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
if(!empty($_REQUEST['id'])){
    $sql=$dbh->prepare('SELECT * FROM teacher where teacherid =:name');
    $sql->bindValue(':name',$_REQUEST['id'],PDO::PARAM_INT);
    $sql->execute();
    $resule=$sql->fetchAll(PDO::FETCH_ASSOC);
}else if (!empty($_REQUEST['address'])){
    $sql=$dbh->prepare('SELECT * FROM teacher where address =:name');
    $sql->bindValue(':name',$_REQUEST['address'],PDO::PARAM_STR);
    $sql->execute();
    $resule=$sql->fetchAll(PDO::FETCH_ASSOC);
}else if (!empty($_REQUEST['domain'])){
    $sql=$dbh->prepare('SELECT * FROM teacher where domain =:name');
    $sql->bindValue(':name',$_REQUEST['domain'],PDO::PARAM_STR);
    $sql->execute();
    $resule=$sql->fetchAll(PDO::FETCH_ASSOC);
}else if (!empty($_REQUEST['age'])){
    $sql=$dbh->prepare('SELECT * FROM teacher where age =:name');
    $sql->bindValue(':name',$_REQUEST['age'],PDO::PARAM_STR);
    $sql->execute();
    $resule=$sql->fetchAll(PDO::FETCH_ASSOC);
}else if (!empty($_REQUEST['tel'])){
    $sql=$dbh->prepare('SELECT * FROM teacher where tel =:name');
    $sql->bindValue(':name',$_REQUEST['tel'],PDO::PARAM_STR);
    $sql->execute();
    $resule=$sql->fetchAll(PDO::FETCH_ASSOC);
}else if (!empty($_REQUEST['furigananame'])){
    $sql=$dbh->prepare('SELECT * FROM teacher where furigananame =:name');
    $sql->bindValue(':name',$_REQUEST['furigananame'],PDO::PARAM_STR);
    $sql->execute();
    $resule=$sql->fetchAll(PDO::FETCH_ASSOC);
}else if (!empty($_REQUEST['emergencycontact'])){
    $sql=$dbh->prepare('SELECT * FROM teacher where emergencycontact =:name');
    $sql->bindValue(':name',$_REQUEST['emergencycontact'],PDO::PARAM_STR);
    $sql->execute();
    $resule=$sql->fetchAll(PDO::FETCH_ASSOC);
}else if (!empty($_REQUEST['sex'])){
    $sql=$dbh->prepare('SELECT * FROM teacher where sex =:name');
    $sql->bindValue(':name',$_REQUEST['sex'],PDO::PARAM_STR);
    $sql->execute();
    $resule=$sql->fetchAll(PDO::FETCH_ASSOC);
}else if (!empty($_REQUEST['name'])){
    $sql=$dbh->prepare('SELECT * FROM teacher where name =:name');
    $sql->bindValue(':name',$_REQUEST['name'],PDO::PARAM_STR);
    $sql->execute();
    $resule=$sql->fetchAll(PDO::FETCH_ASSOC);
}else if (!empty($_REQUEST['birthday'])){
    $sql=$dbh->prepare('SELECT * FROM teacher where birthday =:name');
    $sql->bindValue(':name',$_REQUEST['birthday'],PDO::PARAM_STR);
    $sql->execute();
    $resule=$sql->fetchAll(PDO::FETCH_ASSOC);
}
$teacher_obj=$dbh->prepare('SELECT * FROM teacher');
$sex_obj=$dbh->prepare('SELECT * FROM sex');
$domain_obj=$dbh->prepare('SELECT * FROM subject');
$teacher_obj -> execute();
$sex_obj     -> execute();
$domain_obj  -> execute();

$teacher_list = $teacher_obj->fetchAll(PDO::FETCH_ASSOC);
$sex_list     = $sex_obj->fetchAll(PDO::FETCH_ASSOC);
$domain_list  = $domain_obj->fetchAll(PDO::FETCH_ASSOC);

   
foreach ($resule as $teacher){
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
}
?>