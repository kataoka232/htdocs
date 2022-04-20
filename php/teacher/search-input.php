キーワードを入力してください。
<form method="GET" action="">
<input type='text' name='name'>
<input type='submit' value='検索'>
</form>

<?php

$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8', 'root', '');
$name = $GET['name']
= $pdo->prepare('select 'id','name' * from teacher where name =:name');
$teacher_obj->bindValue(':name',(varchar)$name,PDO::PARAM_STR);
$teacher_obj->execute([$GET['name']]);
$teacher_list = $teacher_obj->fetch(PDO::FETCH_ASSOC);

if(!$teacher_list){
    exit('情報がありません');
}

?>

