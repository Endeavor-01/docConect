<?php
include ('C:\xampp\htdocs\projectphp\dbase.php');
if(isset($_GET['cancel'])){
    $appoint=$_GET['cancel'];

    $sql="DELETE FROM `zappointments` WHERE `appoint_id` = $appoint";
    $result=mysqli_query($conn,$sql);
    if($result){
        header('location:P_viewappoint.php');
    }
    else{
        die(mysqli_error($conn));
    }
}
?>