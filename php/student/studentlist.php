<?php
$pdo=new PDO("mysql:host=localhost;dbname=juku;charset=utf8","root","");

$sql = "select * from student where delete_flag = 0";
// ŒŸõ€–Ú‚ÌðŒ‚É–¼‘Oinamej‚ª‚ ‚Á‚½ê‡
if (isset($_REQUEST['name'])) {
    $sql .= " and name LIKE '%". $_REQUEST['name']. "%'";
}
$query = $pdo->query($sql);
$result = $query->fetchAll();
foreach ($result as $key => $value) {
		echo"<tr>";
		echo "<td>",$value['studentid'], ":","</td>";	
		echo "<td>",$value['course_id'], ":","</td>";
		echo "<td>",$value['name'],"</td>";
		echo "</tr>";
}

?>

