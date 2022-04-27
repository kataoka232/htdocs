
<?php require '../menu.php'; ?>
                     
<h2>講師個人情報一覧表</h2>
<table>
<tr><th>ID</th><th>名前</th><th>フリガナ名前</th><th>住所</th><th>電話番号</th><th>緊急連絡先</th><th>年齢</th><th>性別</th><th>生年月日</th><th>分野</th></tr>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=juku;charset=utf8', 'root', '');

$teacher_obj  = $pdo->query('select * from teacher');
$sex_obj      = $pdo->query('select * from sex');
$domain_obj   = $pdo->query('select * from subject');

$teacher_list = $teacher_obj->fetchAll(PDO::FETCH_ASSOC);
$sex_list     = $sex_obj->fetchAll(PDO::FETCH_ASSOC);
$domain_list  = $domain_obj->fetchAll(PDO::FETCH_ASSOC);

foreach ($teacher_list as $teacher) {
    echo '<tr>';
    echo '<td>',$teacher['teacherid'] ,'</td>';
    echo '<td>',$teacher['name'] ,'</td>';
    echo '<td>',$teacher['furigananame'] ,'</td>';
    echo '<td>',$teacher['address'] ,'</td>';
    echo '<td>',$teacher['tel'] ,'</td>';
    echo '<td>',$teacher['emergencycontact'] ,'</td>';
    echo '<td>',$teacher['age'] ,'</td>';
    
    
	foreach ($sex_list as $sex) {
		if ($teacher['sex']==$sex['id']) {
		    echo '<td>',$sex['name'] ,'</td>';
		}
	}
	echo '<td>',$teacher['birthday'],'</td>';
    foreach ($domain_list as $subject) {
        if ($teacher['domain']==$subject['id']) {
            echo '<td>',$subject['name'],'</td>';
        }
    }
    echo '</tr>';
    echo "\n";
}
?>
</table>