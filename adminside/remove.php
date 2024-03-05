<?php
  include ('C:\xampp\htdocs\projectphp\dbase.php');

   if(isset($_GET['remove'])){
        $remove=$_GET['remove'];
        $select="DELETE FROM `zappointments` WHERE appoint_id = '$remove' ";
        $result=mysqli_query($conn,$select);
        if($result){
        header("location:A_appoininfo.php");
      }
      else{
        die(mysqli_error($conn));
    }
} ?>