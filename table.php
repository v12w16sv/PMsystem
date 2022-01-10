<?php
echo"<pre>\n";
$pdo=new PDO('mysql:host=localhost;port=3306; dbname=studentprojects','root','root');
echo"<pre>\n";
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql="SELECT * FROM projects";
$stmt=$pdo->prepare($sql);
echo'<table border="1">'."\n";
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
    echo"<tr><td>";
    echo($row['Project Details']);
    echo'</td><td>';
    echo($row['Faculty Details']);
    echo'</td><td>';
    echo($row['Available Slots']);
    echo'</td><td>';
    echo($row['Faculty Name']);
    echo'</td></tr>'."\n";
}
echo"</table>"."\n";
$stmt=$pdo->query('SELECT * FROM projects');
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
    print_r($row);
}
?>