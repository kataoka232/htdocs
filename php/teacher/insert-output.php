キーワードを入力してください
<form method='post' action=''>
<input type='text' name='name'>
<input type='text' name='domain'>
<input type='submit' value='検索'>
</form>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8', 'root', '');
$sql = 'INSERT INTO teacher (id, name, domain) VALUES (null, :name, :domain)';
if ($stmt =$pdo->prepare($sql)){
    $stmt->bindValue(':name',$name,PDO::PARAM_STR);
    $stmt->bindValue(':domain',$domain,PDO::PARAM_STR);
    $stmt->execute();
}
  $pdo = null;
  echo $name."を".$domain."分野で追加しました";
?>
    