<?php require '../menu.php'; ?>
<p>コース一覧</p>
<p>コース名：</p>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8','root');
foreach($pdo->query('select * from courseid where delete_flg is null') as $course) {
	echo '<tr>';
	echo '<td>',$course['name'],'</td>';
	echo "\t";
	echo '<td>';
	echo '<a href="course_edit.php?id=',$course['id'],'">編集</a>';
	echo '</td>';
	echo '</tr>';
	echo '<br>';
}
?><br>
<input type="button" onclick="location.href='./course_signup.php'" value="新規登録">
<?php require '../footer.php'; ?>
 