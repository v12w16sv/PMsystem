<?php 
session_start();
include("conn.php");
?>
<?php
$msg = ""; 
if(isset($_POST['teach'])) {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  if($username != "" && $password != "") {
    try {
      $query = "select * from `teachauth` where `Username`=:username and `Password`=:password";
      $stmt = $db->prepare($query);
      $stmt->bindParam('username', $username, PDO::PARAM_STR);
      $stmt->bindValue('password', $password, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
        
      echo"welcome";
      header("Location: https://localhost/mp/tcrmp.php");
       
      } 
      else if($count!=0){
        

      }
      else {
        $msg = "Invalid username and password!";
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } else {
    $msg = "Both fields are required!";
  }
}
if(isset($_POST['stud'])) {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  if($username != "" && $password != "") {
    try {
      $query = "select * from `stauth` where `Username`=:username and `Password`=:password";
      $stmt = $db->prepare($query);
      $stmt->bindParam('username', $username, PDO::PARAM_STR);
      $stmt->bindValue('password', $password, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
        
      echo"welcome";
      header("Location: https://localhost/mp/stmp.php");
       
      } 
      else if($count!=0){
        

      }
      else {
        $msg = "Invalid username and password!";
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } else {
    $msg = "Both fields are required!";
  }
}

?>
<html>
<head>
<link rel="stylesheet" href="stmp.css"></head>
<h1>Welcome to MUJ slot selection portal</h1>
<form method="post">
  <table class="loginTable">
     <tr>
      <th>PANEL LOGIN</th>
     </tr>
     <tr>
      <td>
        <label class="firstLabel">Username:</label>
        <input type="text" name="username" id="username" value="" autocomplete="off" />
      </td>
     </tr>
     <tr>
      <td><label>Password:</label>
        <input type="password" name="password" id="password" value="" autocomplete="off" /></td>
     </tr>
     <tr>
      <!-- <td>
         <input type="submit" name="submitBtnLogin" id="submitBtnLogin" value="Login" />
         <!-- <span class="loginMsg"><?php echo @$msg;?></span> -->
      </td> -->
      <td>
         <input type="submit" name="teach" id="submitBtnLogin" value="Teacher" />
         <span class="loginMsg"><?php echo @$msg;?></span>
      </td>
    
     </tr>
     <tr>  <td>
         <input type="submit" name="stud" id="submitBtnLogin" value="Student" />
         <span class="loginMsg"><?php echo @$msg;?></span>
      </td></tr>
  </table>
 
</form>
</html>
