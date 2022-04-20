<?php
require_once('dbc.php');
$id=$_GET['id'];
if(empty($id)){
    exit('IDが不正です。');
}
$dbh=dbConnect();

$stmt=$dbh->prepare('SELECT * FROM teacher where id =:id';
$stmt->bindValue(':id',(int)$id,PDO::PARAM_INT);
$stmt->execute();
$resule=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<tr><th>ID</th><th>名前</th></tr>
<?php
foreach($resule as $teacher){
    echo '<tr>';
    echo '<td>',$teacher['id'],'</td>';
    echo '<td>',$teacher['name'],'</td>';
    echo '</tr>';
}
?>
