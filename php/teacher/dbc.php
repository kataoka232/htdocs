<?php
$pdh=new PDO('mysql:host=localhost;dbname=juku;charset=utf8', 'root', '');

function getAllteacher(){
    $dbh=dbConnect();
    $sql= 'SELECT * FROM teacher';
    $stmt=$dbh->query($sql);
    $result=$stmt->fetchall(/PDO::FETCH_ASSOC);
    return $result;
    $dbh=null;
}
$teacheDater=getAllteacher();

<table>
<tr><th>ID</th><th>名前</th></tr>
<?php
foreach (teacherDate as $teacher){
    echo '<tr>';
    echo '<td>',$teacher['id'],'</td>';
    echo '<td>',$teacher['name'],'</td>';
    echo '</tr>';
}
?>