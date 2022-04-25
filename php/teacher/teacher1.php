<?php require '../menu.php'; ?>

<p>講師登録</p>
<form action='teacher1-out.php' method='post'>
<br>名前<input type='text' name='name'></br>
<br>フリガナ<input type='text' name='furigananame'></br>
<br>住所<input type='text'  name='address'></br>
<br>電話<input type='text'  name='tel'></br>
<br>緊急連絡先<input type='text' name='emergencycontact'></br>
<br>年齢<input type='text' name='age'></br>
<br>性別<select name='sex'></br>
<option value="">-</option>
<option value='1'>男</option>
<option value='2'>女</option>
<br></select></br>
<br>生年月日<select name='year'></br>
<option>-</option>
<?php
for ($i=2022;$i>1900;$i--){
   echo '<option value="',$i,'">',$i,'</option>';
}
?>
</select>年
<select name='month'>
<option>-</option>
<?php
for ($q=1;$q<13;$q++){
   echo '<option value="',$q,'">',$q,'</option>';
}
?>
</select>月
<select name='day'>
<option>-</option>
<?php
for ($e=1;$e<31;$e++){
   echo '<option value="',$e,'">',$e,'</option>';
}
?>
<br></select>日</br>
<br>ID<input type='text' name='id'></br>
<br>担当科目<select name='suject'></br>
<option>-</option>
<option value='1'>国語</option>
<option value='2'>数学</option>
<option value='3'>社会</option>
<option value='4'>英語</option>
<option value='5'>理科</option>
<br></select></br>
<br><input type='submit' value='確定'><br>
</form>
