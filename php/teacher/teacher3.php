<?php require 'menu.php';?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8', 'root', '');
echo '<tr>';

if (!empty($_REQUEST['name'])){
    echo '<td>',$_REQUEST['name'],'</td>';
}
if (!empty($_REQUEST['furigananame'])){
    echo '<td>',$_REQUEST['furigananame'],'</td>';
}
if (!empty($_REQUEST['address'])){
    echo '<td>',$_REQUEST['address'],'</td>';
} 
if (!empty($_REQUEST['tel'])){
    echo '<td>',$_REQUEST['tel'],'</td>';
} 
if (!empty($_REQUEST['emergencycontact'])){
    echo '<td>',$_REQUEST['emergencycontact'],'</td>';
}
if (!empty($_REQUEST['age'])){
    echo '<td>',$_REQUEST['age'],'</td>';
} 
if (!empty($_REQUEST['sex'])){
   $sex_obj=$pdo->prepare('SELECT * FROM sex');
   $sex_obj     -> execute();
   $sex_list     = $sex_obj->fetchAll(PDO::FETCH_ASSOC);
   foreach ($sex_list as $sex) {
		    if ($_REQUEST['sex']==$sex['id']) {
		        echo '<td>',$sex['name'] ,'</td>';
		    }
	    }
}
if (!empty($_REQUEST['birthday'])){
    echo '<td>',$_REQUEST['birthday'],'</td>';
}
if (!empty($_REQUEST['domain'])){
    $domain_obj=$pdo->prepare('SELECT * FROM subject');
    $domain_obj  -> execute();
    $domain_list  = $domain_obj->fetchAll(PDO::FETCH_ASSOC);
     foreach ($domain_list as $subject) {
            if ($_REQUEST['domain']==$subject['id']) {
                echo '<td>',$subject['name'],'</td>';
            }
        }
echo '</tr>';
}

$stmt = $pdo -> prepare("INSERT INTO teacher (name,furigananame,address,tel,emergencycontact,age,sex,birthday,domain )
 VALUES (:name, :furigananame,:address,:tel,:emergencycontact,:age,:sex,:birthday,:domain)");
$stmt->bindParam(':name',$_REQUEST['name'], PDO::PARAM_STR);
$stmt->bindValue(':furigananame', $_REQUEST['furigananame'], PDO::PARAM_STR);
$stmt->bindParam(':address',$_REQUEST['address'], PDO::PARAM_STR);
$stmt->bindValue(':tel', $_REQUEST['tel'], PDO::PARAM_STR);
$stmt->bindParam(':emergencycontact',$_REQUEST['emergencycontact'], PDO::PARAM_STR);
$stmt->bindValue(':age', $_REQUEST['age'], PDO::PARAM_INT);
$stmt->bindParam(':sex',$_REQUEST['sex'], PDO::PARAM_INT);
$stmt->bindValue(':birthday', $_REQUEST['birthday'], PDO::PARAM_STR);
$stmt->bindValue(':domain', $_REQUEST['domain'], PDO::PARAM_INT);

$stmt->execute();
?>