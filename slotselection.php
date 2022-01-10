<?php
  

  $pdo=new PDO('mysql:host=localhost;port=3306; dbname=studentprojects','root','root');
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  if(isset($_POST['regno']))
  {
   echo"All set";
   echo"  ".$_POST['slot'];
   $slotsel=$_POST['slot'];
  
  
  $sql="UPDATE projects SET $slotsel =(:regno) WHERE Sr_No=:srno" ;


  $stmt=$pdo->prepare($sql);
  $stmt->execute(array(':regno'=>$_POST['regno'],':srno'=>$_POST['srno']));
  }
?>

<html >
    <head>
        <title>Select Slot</title>
        <link rel="stylesheet" href="ss.css">
    </head>

    <body>
        <h1>Please select your slot:</h1>
        <form method="post" >
            <table>
                <tr>
                    <td><label for="srno" >Enter Sr.No of the faculty</label></td><td><input type="number" name="srno" value=""></td></tr><br>
                <tr><td><label for="prno" >Enter Sr.No of the Project</label><br>
              
                <input type="radio" id="male" name="slot" value="slot1">
                <label for="slot1">Slot1</label><br>

<input type="radio" id="female" name="slot" value="slot2">
<label for="slot2">Slot2</label><br>

<input type="radio" id="other" name="slot" value="slot3">
<label for="slot3">Slot3</label><br>
 
<input type="radio" id="other" name="slot" value="slot4">
<label for="slot4">Slot4</label>

                <tr><td><label for="stname" >Enter your Full name</label></td><td><input type="varchar" name="stname" value=""></td></tr><br>
                <tr><td><label for="regno" >Enter Reg.No</label></td><td><input type="number" name="regno" value=""></td></tr><br>
            </table>
            <input type="submit" value="add new">
        </form>
        <p><a href="mp.html">Back to Projects</a></p>

    </body>

   
</html>

