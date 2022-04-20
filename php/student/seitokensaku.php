<table>
<tr><th></th></tr>
<tr><td></td></tr>

<tr><th>生徒検索</th></tr>
<form action="seitokensaku.php" method="post">
	<tr><th>
	名前
	<td><input type="text" name="name"></td>
	<td><input type="submit" value="検索"></td>
	</th></tr>
	<tr><th>
	フリガナ
	<td><input type="text" name="furigana"></td>
	<td><input type="submit" value="検索"></td>
	</tr></th>
	<tr><th>住所
	<td><input type="text" name="address"></td>
	<td><input type="submit" value="検索"></td>
	</tr></th>
	<tr><th>電話
	<td><input type="text" name="tell"></td>
	<td><input type="submit" value="検索"></td>
	</tr></th>
	<tr><th>緊急連絡先
	<td><input type="text" name="emargency"></td>
	<td><input type="submit" value="検索"></td>
	</tr></th>
	<tr><th>学年
	<td><input type="text" name="year"></td>
	<td><input type="submit" value="検索"></td>
	</tr></th>
	<tr><th>性別
	<td><select name="sex">
	<?php
	for ($i=1;$i<3;$i++){
		$pdo new PDO("mysql:host=localhost;dbname=juku;charset=utf8","root","");
		echo '<option value="',$i,'">',$i,'</option>';
	}
	?>
	</select>
	</td>
	<td><input type="submit" value="検索"></td>
	</tr></th>
	<tr><th>生年月日
	<td><input type="date" name="birthday"></td>
	<td><input type="submit" value="検索"></td>
	</tr></th>
	<tr><th>ID
	<td><input type="text" name="id"></td>
	<td><input type="submit" value="検索"></td>
	</tr></th>
	<tr><th>受講コース
	<td><input type="text" name="course"></td>
	<td><input type="submit" value="検索"></td>
	</tr></th>

</form>
