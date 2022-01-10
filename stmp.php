<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=studentprojects;charset=utf8mb4', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);	
    // echo"connection ho gya succesful";
  } catch (PDOException $e) {
    echo "Connection failed : ". $e->getMessage();
  }
?>
<html>
<head>
<link rel="stylesheet" href="stmp.css">
<script src = "stmp.js"></script>
</head><body>


<div>
<h2 >Please select an available slot:</h2>
        <form method="post" name="stmp">
     <table>
<div id="tab">
 <tr>
 <td><label type="dropdown" for="srno" >Enter Sr.No of the faculty</label></td><td><input type="number" name="srno" value=""></td></tr><br>
<tr><td><label for="prno" >Enter Sr.No of the Project:</label><br>
              
<input type="radio" id="male" name="slot" value="slot1a">
<label for="slot1a">Slot1a</label><br>

<input type="radio" id="female" name="slot" value="slot1b">
<label for="slot2">Slot1b</label><br>

<input type="radio" id="other" name="slot" value="slot2a">
<label for="slot3">Slot2a</label><br>
 
<input type="radio" id="other" name="slot" value="slot2b">
<label for="slot4">Slot2b</label>
<tr><td><label for="stname" >Enter your Full name</label></td><td><input type="varchar" name="stname" value=""></td></tr><br>
<tr><td><label for="regno" >Enter Reg.No</label></td><td><input type="number" name="regno" value=""></td></tr><br>
 </div>
</table><br>
            <input onclick="sbmit()" id="ad" style="text-align:centre" type="submit" value="submit">
            <p> To download the Faculty and Project details please click
    
         <a href="mprf.pdf" download="GFG">
         <button type="button">Download</button>
         </a></p>
        </form>
        <!-- <p><a href="mp.html">Back to Projects</a></p> -->
            

<table border="1">
<tr><th>Sr_No</th><th>FacultyName</th><th>FacultyDetails</th><th>Slot1a</th><th>Slot1b</th><th>Slot2a</th><th>Slot2b</th></tr>
<?php


$stmt=$db->query("SELECT Sr_No, FacultyName, FacultyDetails, slot1a,slot1b,slot2a,slot2b FROM projects");
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
<?php
error_reporting(0);
// echo nl2br("chlrha\n ");
$slotsel=$_POST['slot'];
$sqlr = "SELECT $slotsel FROM `projects` WHERE Sr_No=:srno "; 
$res = $db->prepare($sqlr); 
$res->execute([$slotsel]); 
echo nl2br("\n");
echo nl2br($slotsel."\n");

$number_of_rows =$res->rowCount();
echo nl2br($number_of_rows); 
if($number_of_rows==0)
{
  $sqlr="UPDATE projects SET $slotsel =(:regno) WHERE Sr_No=:srno" ;
$res = $db->prepare($sqlr); 

$res->execute(array(':regno'=>$_POST['regno'],':srno'=>$_POST['srno']));
echo nl2br("slot khali bhr gya\n");
 
}
else
{

  echo nl2br("The slot is full , please select another slot \n");
}

 
// if(isset($_POST['regno']))
// {
//  echo"All set";
//  echo"  ".$_POST['slot'];
//  $slotsel=$_POST['slot'];
//  echo"slot success\n";


// $sql="UPDATE projects SET $slotsel =(:regno) WHERE Sr_No=:srno" ;


// $stmt=$db->prepare($sql);
$res->execute(array(':regno'=>$_POST['regno'],':srno'=>$_POST['srno']));
 echo "iski vajah se update ho rha bhen ka lwda\n";
// }
// else{
//   echo"regno post fail";
// }
// echo"mast code hai\n";


?>


</table>



</body></html>
