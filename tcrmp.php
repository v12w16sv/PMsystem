<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=studentprojects;charset=utf8mb4', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);	
    // echo"connection succesful";
  } catch (PDOException $e) {
    echo "Connection failed : ". $e->getMessage();
  }
 
?>
<html>
<head>
<link rel="stylesheet" href="stmp.css">
</head><body>
<table border="1">
<tr><th>Sr_No</th><th>FacultyName</th><th>FacultyDetails</th><th>Slot1a</th><th>Slot1b</th><th>Slot2a</th><th>Slot2b</th></tr>

<?php

$stmt=$db->query("SELECT Sr_No, FacultyName,  FacultyDetails, slot1a,slot1b,slot2a,slot2b FROM projects");
// echo "success stmt";
while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
    echo("<tr><td>");
    echo($row['Sr_No']);
    echo("</td><td>");
    echo($row['FacultyName']);
    echo("</td><td>");
    
    echo($row['FacultyDetails']);
    echo("</td><td>");
    echo($row['slot1a']);
    echo("</td><td>");
    echo($row['slot1b']);
    echo("</td><td>");
    echo($row['slot2a']);
    echo("</td><td>");
    echo($row['slot2b']);
    echo("</td><td>");

}


?>
</table>

<fieldset>
<form action="" method="post">
<label for="FacultyName">FacultyName </label>
<input type="" name="FacultyName" value=""><br><br>
<label for="ProjectDetails">ProjectDetails</label>
<input type="" name="ProjectDetails" value=""><br><br>
<label for="FacultyDetails">FacultyDetails</label>
<input type="" name="FacultyDetails" value=""><br><br>
<label for="Sr_No">Sr_No</label>
<input type="" name="Sr_No" value=""><br><br>
<input id="ad" type="submit" value="add new">
<?php
error_reporting(0);
$sql="INSERT INTO projects (Sr_No,FacultyName,FacultyDetails) VALUES (:Sr_No,:FacultyName,:FacultyDetails) " ;


$br=$db->prepare($sql);
$br->execute(array(':Sr_No'=>$_POST['Sr_No'],':FacultyName'=>$_POST['FacultyName'],':FacultyDetails'=>$_POST['FacultyDetails']));

// $password = trim($_POST['password']);
// $query = "insert into projects (Sr_No, FacultyName, FacultyDetails) VALUES (:Sr_No, :FacultyName,  :FacultyDetails)';
// $br = $db->prepare($query);
// $br->bindParam('Sr_No', $Sr_No, PDO::PARAM_STR);
// $br->bindValue('FacultyName', $FacultyName, PDO::PARAM_STR);
// $br->bindValue('FacultyDetails', $FacultyDetails, PDO::PARAM_STR);
// $br->execute();
?>

</form></fieldset>
</table>


</body>
</html>
