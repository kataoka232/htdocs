<p>確認画面</p>

<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8', 'root', '');
$sex_obj=$pdo->prepare('SELECT * FROM sex');
$domain_obj=$pdo->prepare('SELECT * FROM subject');
$sex_obj     -> execute();
$domain_obj  -> execute();

$sex_list     = $sex_obj->fetchAll(PDO::FETCH_ASSOC);
$domain_list  = $domain_obj->fetchAll(PDO::FETCH_ASSOC);

echo '<br>',"名前:", $_REQUEST['name'],'</br>';
echo '<br>',"フリガナ:", $_REQUEST['furigananame'],'</br>';
echo '<br>',"住所:",$_REQUEST['address'],'</br>';
echo '<br>',"電話:",$_REQUEST['tel'],'</br>';
echo '<br>',"緊急連絡先:",$_REQUEST['emergencycontact'],'</br>';
echo '<br>',"年齢:",$_REQUEST['age'],'</br>';
foreach ($sex_list as $sex) {
    if ($_REQUEST['sex']==$sex['id']) {
		echo '<br>','<td>',"性別：",$sex['name'] ,'</td>','</br>';
    }
}
echo '<br>',"生年月日:",$_REQUEST['birthday'],'</br>';
foreach ($domain_list as $subject) {
    if ($_REQUEST['domain']==$subject['id']) {
        echo '<br>','<td>',"分野：",$subject['name'],'</td>','</br>';
    }
}
    echo '</tr>';

?>
<form methed="post" action="teacher3.php">
<input type="hidden" name="name" value="<?php echo $_REQUEST['name'] ?>"/>
<input type="hidden" name="furigananame" value="<?php echo $_REQUEST['furigananame'] ?>"/>
<input type="hidden" name="address" value="<?php echo $_REQUEST['address'] ?>"/>
<input type="hidden" name="tel" value="<?php echo $_REQUEST['tel'] ?>"/>
<input type="hidden" name="emergencycontact"value="<?php echo $_REQUEST['emergencycontact'] ?>"/ >
<input type="hidden" name="age" value="<?php echo $_REQUEST['age'] ?>"/>
<input type="hidden" name="sex" value="<?php echo $sex['name'] ?>"/>
<input type="hidden" name="birthday" value="<?php echo $_REQUEST['birthday'] ?>"/>
<input type="hidden" name="domain" value="<?php echo $subject['name'] ?>"/>

<br><input type="submit" value="登録"/></br>
</form>