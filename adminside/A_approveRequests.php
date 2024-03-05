<?php
  include ('C:\xampp\htdocs\projectphp\dbase.php');

   if(isset($_GET['approve'])){
        $dno=$_GET['approve'];
        $select="UPDATE `doctors` SET status = 'approved' WHERE dno = '$dno' ";
        $result=mysqli_query($conn,$select);
        if($result){
        header("location:A_adminboard.php");
      }
      else{
        die(mysqli_error($conn));
    }
} ?>