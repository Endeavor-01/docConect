<?php 
   session_start();
   if(!isset($_SESSION['email'])){
        header('Location:projectphp\adminlogin.php');
   }


    include ('C:\xampp\htdocs\projectphp\dbase.php');   
   ?>
    
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin's page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" ></script>
  <style>
    .topnav {
  overflow: hidden;
  background-color: #0096f3;
}

/* Style the links inside the navigation bar */
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
.topnav .button{
  margin-top:5px;
}

.topnav a:hover {
  background-color: #48e60e;
  color: rgb(240, 231, 231);
}

.topnav a.active {
  background-color: #2196F3;
  color: rgb(239, 234, 234);
}

.topnav .search-container {
  float:right;
  margin-bottom:10px
}

.topnav .search-container button {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
 
  outline-color: #48e60e;
  font-size: 17px;
  border: none;
  cursor: pointer;
}



#icon1{
  margin-top:20px;
  margin-left: 150px;
}
#icon2{
  margin-left: 170px;
}
#icon3{
  margin-left: 200px;
}


    </style>
</head>


<body>
  <div class="topnav">
  <a class="active" href="A_adminboard.php">ADMIN</a>
    <a href="A_docinfo.php">Doctors Info</a>
    <a href="A_patinfo.php">Patients Info</a>
    <a href="A_appoininfo.php">View Appointments</a>
 
    <div style="float:right">
    <a href="A_logout.php" class="btn btn-danger" name="logout" >Log out</a>
    </div>
</div>
  <!-- <h1 style="text-align:center;">ADMIN PANEL</h1> -->
  <br>
<i class="fa-solid fa-users fa-2xl"  id="icon1" style="color: #0f0f0f;"></i>
<?php

$sql="SELECT * FROM `doctors`";
$result = mysqli_query($conn,$sql);
    $num1 = mysqli_num_rows($result);
    
    
    $sql="SELECT * FROM `patient`";
    $result= mysqli_query($conn,$sql);
    $num2 = mysqli_num_rows($result);
    $num = $num1 + $num2;
    echo "&nbsp&nbsp&nbspTotal Users:  ".$num;
    ?>
<i class="fa-solid fa-user-doctor fa-2xl" id="icon2" style="color: #141414;"></i>
<?php
    $sql="SELECT * FROM `doctors`";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    echo "&nbsp&nbsp&nbspTotal Doctors:   ". $num ;
    ?>
<i class="fa-solid fa-user fa-2xl" id="icon3" style="color: #050505;"></i>
<?php
           $sql="SELECT * FROM `patient`";
           $result= mysqli_query($conn,$sql);
           $num = mysqli_num_rows($result);
           echo "&nbsp&nbsp&nbspTotal Patients:   ". $num ." <br>";
           echo "<br>";
           echo "<br>";
           echo "<br>";?>

<h2 style="text-align:center;">PENDING REQUESTS</h2>
<table class="table  table-striped table-hover table-bordered">
    <thead class="table-primary">
      <tr>
       
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        
        <th scope="col">Phone.no</th>
        <th scope="col">Expertise</th>
        <th scope="col">Experience</th>
        <th scope="col">Year Of Passing</th>
        <th scope="col">Place</th>
        <th scope="col">Fee</th>
        <th scope="col">Address</th>
        <th scope="col">Qualification</th>
        <th scope="col">Start_time</th>
        <th scope="col">End_time</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      echo'<br>';
    $sql="SELECT * FROM `doctors` where `status`='pending' order by dno asc";;
    $result = mysqli_query($conn,$sql);
    
    // echo "<br>";
    // echo "&nbsp&nbsp&nbsp". $num ."  doctors registered into website <br>";
    // echo "<br>";
  
    if($result){
        while($row=mysqli_fetch_assoc($result)){
          $dno=$row['dno'];
          $name=$row['name'];
          $email=$row['email'];
          
          $phno=$row['phono'];
          $expertise=$row['expertise'];
          $experince=$row['experience'];
          $yop=$row['yop'];
          $price=$row['price'];
          $place=$row['place'];
          $address=$row['address'];
          $qualification=$row['qualification']; 
          $start_time=$row['start_time'];
          $end_time=$row['end_time'];
       
           
            echo ' <tr>            
            <td >'.$name.'</td>
            <td >'.$email.'</td>
           
            <td >'.$phno.'</td>
            <td >'.$expertise.'</td>
            <td >'.$experince.'</td>
            <td >'.$yop.'</td>
            <td >'.$place.'</td>
            <td >'.$price.'</td>
            <td >'.$address.'</td>
            <td >'.$qualification.'</td>
            <td >'.$start_time.'</td>
            <td >'.$end_time.'</td>
            
            <td>
            <form action="A_adminboard.php" method="POST">
            <button class="btn btn-primary"><a href="A_approveRequests.php?approve='.$dno.'" class="text-light" onclick="myFunction()">Approve</a></button>
            <button class="btn btn-danger"><a href="A_declineRequests.php?decline='.$dno.'" class="text-light" onclick="myFunctions()">Decline</a></button>
            </form>
            </td>
            </tr>';
        }
    }  
    ?>
<script>
function myFunction() {
  alert("The doctor has been approved");
}
</script>
<script>
function myFunctions() {
  alert("The doctor has been declined");
}
</script>
    </tbody>
  </table>           
</body>

</html>  