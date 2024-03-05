<?php
  include ('C:\xampp\htdocs\projectphp\dbase.php');

   if(isset($_GET['complete'])){
        $complete=$_GET['complete'];
        $select="UPDATE `zappointments` SET status1 = 'completed' WHERE appoint_id = '$complete' ";
        $result=mysqli_query($conn,$select);
        if($result){
        header("location:D_myappoint.php");
      }
      else{
        die(mysqli_error($conn));
    }
} ?>