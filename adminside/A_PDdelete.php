<?php
include ('C:\xampp\htdocs\projectphp\dbase.php');
if(isset($_GET['delete'])){
    $pid=$_GET['delete'];

    $sql="DELETE FROM `patient` WHERE `patient`.`pid` = $pid";
    $result=mysqli_query($conn,$sql);
    if($result){
        header('location:A_patinfo.php');
    }
    else{
        die(mysqli_error($conn));
    }
}
if(isset($_GET['deleteid'])){
    $dno=$_GET['deleteid'];

    $sql="DELETE FROM `doctors` WHERE dno= $dno";
    $result=mysqli_query($conn,$sql);
    if($result){
        header('location:A_docinfo.php');
    }
    else{
        die(mysqli_error($conn));
    }
} 
?>