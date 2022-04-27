<DOCTYPE html>
<html>
<head>
<meta charset="UTF=8">
<title>Login</title>
<style>
body {
	padding: 10px;
}
form {
	text-align: center;
	width: 400px;
	height: 140px;
	padding-top: 15px; 
	margin: 20px 200px;
	border: 1px solid #ccc;
}
input {
	margin: 10px;
}
</style>
</head>

<h1>ログイン</h1>
<form action="home.php" method="post">
アカウント名:<input type="text" name="name"><br>
パスワード:<input type="password" name="password"><br>
<input type="submit" value="ログイン">
<input type="button" onclick="location.href='../account/.php'" value="アカウント新規登録">
</form>

<?php require '../footer.php'; ?>
