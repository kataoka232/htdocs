キーワードを入力してください
<form method='post' action=''>
<input type='text' name='id'>
<input type='submit' value='検索'>
</form>

<table>

<?php
 $dbh=new PDO('mysql:host=localhost;dbname=juku;charset=utf8', 'root', '');
  $id= mb_convert_kana($_REQUEST['id'],'n', 'UTF-8');
if(!empty($id)){
    
    $sql=$dbh->prepare('SELECT * FROM teacher where teacherid =:name');
    $sql->bindValue(':name',$id,PDO::PARAM_INT);
    $sql->execute();
    $resule=$sql->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($resule as $teacher){
        echo '<tr>';
        echo '<td>',$teacher['teacherid'],'</td>';
        echo '<td>',$teacher['name'],'</td>';
        echo '</tr>';
        
    }
}
?>
</table>