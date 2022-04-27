<?php require 'menu.php';?>
<p>講師登録</p>
<form action='teacher2.php' method='post'>
<br>名前<input type='text' name='name'></br>
<br>フリガナ<input type='text' name='furigananame'></br>
<br>住所<input type='text'  name='address'></br>
<br>電話<input type='text'  name='tel'></br>
<br>緊急連絡先<input type='text' name='emergencycontact'></br>
<br>年齢<input type='text' name='age'></br>
<br>性別<select name='sex'></br>
<option value=""></option>
<option value='1'>男</option>
<option value='2'>女</option>
<br></select></br>
<br>生年月日
<input type="date" name="birthday" value=
"<?php if( !empty($_POST['birthday']) ){echo $_POST['birthday'];
} ?>"></br>
<br>担当科目<select name='domain'></br>
<option></option>
<option value='1'>国語</option>
<option value='2'>数学</option>
<option value='3'>社会</option>
<option value='4'>英語</option>
<option value='5'>理科</option>
<br></select></br>
<br><input type='submit' value='確定'><br>
</form>
