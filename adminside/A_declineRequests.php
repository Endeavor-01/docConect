<?php
 include ('C:\xampp\htdocs\projectphp\dbase.php');
      //rejecting the requests
if(isset($_GET['decline'])){
  $dno=$_GET['decline'];
  $select="DELETE FROM `doctors` WHERE `dno` =  '$dno' ";
  $result=mysqli_query($conn,$select);
  if($result){
    header("location:A_adminboard.php");
  }
  else{
    die(mysqli_error($conn));
}
} ?>