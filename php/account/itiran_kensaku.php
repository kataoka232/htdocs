<?php require '../menu.php'; ?>

IDを入力してください。
<html>
<form action="itiran_kensaku.php" method="post">
<input type="text" name="id"   value="<?php if( !empty($_POST['id']) ){ echo $_POST['id'];}?>"><br>
アカウント名を入力してください。<br>
<input type="text" name="name" value="<?php if( !empty($_POST['name']) ){ echo $_POST['name'];}?>"><br>
<input type="submit" value="検索">&emsp;
<input type="button" onclick="history.back()" value="戻る">&emsp;
<input type="button" onclick="location.href='./list.php'" value="一覧に戻る"><br>
<input type="hidden" name="search" value=1>

<?php
// エラー非表示
 //error_reporting(E_NOTICE);
     
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8','root');

if(!empty($_POST['id'])or!empty($_POST['name'])){
	//$stmt= $pdo->prepare('select * from account where id = ?  and name like ?');
	//$stmt->bindValue(1,     $_REQUEST['account_id']  ,PDO::PARAM_STR);
	//$stmt->bindValue(2, '%'.$_REQUEST['account_name'].'%',PDO::PARAM_STR);
	//$stmt->execute();
    $sql="select * from account where delete_flg = 0 ";
    $bind=[];

    if(!empty($_REQUEST["id"])){
             $sql.="and id = ?";
             $bind[]=$_REQUEST["id"];
    }

    if(!empty($_REQUEST["name"])){
             $sql.="and name like ?";
             $bind[]='%'.$_REQUEST["name"].'%';
    }

    //$result=$select->fetchAll();
    $sql = $pdo->prepare($sql);
    $sql->execute($bind);
    $result=$sql->fetchAll();

	//$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


	//$sql=$pdo->prepare('select * from account where name like ?');
	//$sql->execute(['%'.$_REQUEST['keyword'].'%']);

	foreach ($result as $row) {
        echo '<p>';
		echo '<tr>';
        echo '<"　　">';
		echo '<td>', $row['id'], '</td>';
        echo '<td>', "　"   ,'</td>';
		echo '<td>', $row['name'], '</td>';
		echo '</tr>';
        echo '</p>';
		echo "\n";
	}
} else {

	$stmt= $pdo->query('select * from account');
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	foreach ($result as $row) {
        echo '<p>';
		echo '<tr>';
        echo '<"　　">';
		echo '<td>', $row['id'], '</td>';
        echo '<td>', "　"   ,'</td>';
		echo '<td>', $row['name'], '</td>';
		echo '</tr>';
        echo '</p>';
		echo "\n";
	   }
}
         
//searchがあるかつキーワードがある時、検索する。

?>
</html>
</form>
<?php require '../footer.php'; ?>