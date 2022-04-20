キーワードを入力してください。
<form action='2.php' method='post'>
   ID:<input type ='text' name='teacherid' value="<?php echo $_POST['teacherid']?>">
   <br>
   名前:<input type='text' name='name' value="<?php echo $_POST['name']?>"><br>
   <br>
   フリガナ名前:<input type='text' name='furigananame' value="<?php echo $_POST['furigananame']?>"><br>
   住所:<input type='text' name='address' value="<?php echo $_POST['address']?>"><br>
   <br>
   電話番号:<input type ='text' name='tel' value="<?php echo $_POST['tel']?>"><br>
   <br>
   緊急連絡先:<input type='text' name='emergencycontact' value="<?php echo $_POST['emergencycontact']?>"><br>
   <br>
   年齢:<input type='text' name='age' value="<?php echo $_POST['age']?>"><br>
   <br>
   性別:<input type='text' name='sex' value="<?php echo $_POST['sex']?>"><br>
   <br>
   生年月日:<input type='text' name='birthday' value="<?php echo $_POST['birthday']?>"><br>
   <br>
   分野:<input type='text' name='domain' value="<?php echo $_POST['domain']?>"><br>
<input type='text' name='keyword'>
<input type='submit' value='検索'>
</form>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8', 'root', '');
    if(@$_POST["teacherid"] != "" OR @$_POST["user_name"] != "" OR @$_POST["furigananame"] != "" OR @$_POST["address"] != "" OR @$_POST["tel"] != "" OR @$_POST["emergencycontact"] != "" OR @$_POST["age"] != "" OR @$_POST["sex"] != "" OR @$_POST["birthday"] != "" OR @$_POST["domain"] != ""){
        $stmt = $pdo->query("SELECT * FROM teacher WHERE ID='".$_POST["id"] ."' OR Name LIKE  '%".$_POST["user_name"]."%')");
    }
?>
<table>
<tr><th>ID</th><th>名前</th><th>フリガナ名前</th><th>住所</th><th>電話番号</th><th>緊急連絡先</th><th>年齢</th><th>性別</th><th>生年月日</th><th>分野</th></tr>
<?php foreach($stmt as $row); ?>
<php endforeach; ?>
</table>