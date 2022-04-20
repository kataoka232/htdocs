<?php require '../header.php'; ?>
<table>
<?php
$pdo = new PDO('mysql:charset=UTF8;dbname=juku;host=localhost', 'teacher', 'password');

foreach ($pdo->query('select * from account') as $row){
     if($row['delete_flg']==0){
     echo '<tr>';
     echo '<td>',$row['id'],'</td>';
     echo '<td>',$row['name'],'</td>';
     echo '<td>',$row['password'],'</td>';
}
     echo '<td>';
     echo '<a href="delete-output.php?id=', $row['id'],'">削除</a>';
     echo '</td>';
     echo '</tr>';
}
?>
</table>
<?php require '../footer.php';?>