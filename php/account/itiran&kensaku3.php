<?php require '../header.php'; ?>
キーワードを入力してください。
<html>
<form action="itiran&kensaku3.php" method="post">
<input type="text" name="keyword">
<input type="submit" value="検索"><br><br><br>
<input type="hidden" name="search" value="1">


<?php

// エラー非表示
// error_reporting(E_NOTICE);

    //if(empty($_POST["keyword"])){
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8','teacher', 'password');
$stmt= $pdo->prepare('select * from account where name like ?');
//$stmt->bindValue(1,$_REQUEST['keyword'],PDO::PARAM_INT);
$stmt->bindValue(1,$_REQUEST['keyword'],PDO::PARAM_STR);
//$stmt->bindValue(3,$_REQUEST['keyword'],PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


print_r('<pre>');
print_r($result);
print_r('</pre>');
//$sql=$pdo->prepare('select * from account where name like ?');
//$sql->execute(['%'.$_REQUEST['keyword'].'%']);
foreach ($stmt as $row) {
	echo '<tr>';
	echo '<td>', $row['id'], '</td>';
	echo '<td>', $row['name'], '</td>';
	echo '<td>', $row['password'], '</td>',"<br>";
	echo '</tr>';
	echo "\n";
             }
//}
     //if(empty($_POST["keyword"])){
       //echo "キーワードを入れてください。";
        //} 
//searchがあるかつキーワードがある時、検索する。

?>
</html>


</form>
<?php require '../footer.php'; ?>