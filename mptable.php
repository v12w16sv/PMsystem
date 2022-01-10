<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=studentprojects;charset=utf8mb4', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);	
    echo"connection succesful";
  } catch (PDOException $e) {
    echo "Connection failed : ". $e->getMessage();
  }
?>
<html>
<head>
</head><body>
<table border="1">
<?php

$stmt=$db->query("SELECT Sr_No, FacultyName, ProjectDetails, FacultyDetails, slot1,slot2,slot3,slot4 FROM projects");
echo "success stmt";
while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
    echo("<tr><td>");
    echo($row['Sr_No']);
    echo("</td><td>");
    echo($row['FacultyName']);
    echo("</td><td>");
    echo($row['ProjectDetails']);
    echo("</td><td>");
    echo($row['FacultyDetails']);
    echo("</td><td>");
    echo($row['slot1']);
    echo("</td><td>");
    echo($row['slot2']);
    echo("</td><td>");
    echo($row['slot3']);
    echo("</td><td>");
    echo($row['slot4']);
    echo("</td><td>");

}


?>
</table></body>
</table></html>