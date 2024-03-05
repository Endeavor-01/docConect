<?php
  session_start();
 if(!isset($_SESSION['email'])){
      header('Location:projectphp\patientlogin.php');
      exit();
 }
 include ('C:\xampp\htdocs\projectphp\dbase.php');

?>


  <!DOCTYPE html>
<html>
  <head>
    <title>patients page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
<style>
  body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
    width: 100%;
    background-color:#0096f3;
    overflow: auto;
  }
  
  .navbar a {
    float: left;
    padding: 12px;
    color: black;
    text-decoration: none;
    font-size: 17px;
  }
  
  .navbar a:hover {
    background-color: #48e60e;
  }
  
  .active {
   
    background-color:#0096f3;
  }
  
ul {
    list-style-type: none;
    
}
li{
  font-weight: bold;
}
h1{
  margin-left:20px
}
h2{
  margin-left:40px
}
h{
  margin-left:30px
}
button{
  margin-left:90%;
}
</style>
</head>

<body>

   


<div class="navbar">
  <a class="active" href="P_mydetails.php">My Details</a> 
  <a href="P_searchdoc.php"> Search Doctor</a> 
  <a href="P_bookappoint.php"> Book Appointment</a> 
  <a href="P_viewappoint.php"> View Appointment</a> 
  <a href="P_logout.php" class="btn btn-danger">Log out</a>
</div>

<table class="table  table-striped table-hover" style ="margin-top: 30px;">
  <tbody>

 <?php
 $email=$_SESSION['email'];  

 $sql="SELECT * FROM `patient`where email='$email'";
 $result= mysqli_query($conn,$sql);
 $num = mysqli_num_rows($result);
 if($result){
  $row=mysqli_fetch_assoc($result);
  
                $pid=$row['pid'];
                $name= $row['fname'];
                $email= $row['email'];
                $password=$row['password'];
                $phno=$row['phno'];
                $dob=$row['DOB'];
                $gender=$row['gender'];
                $blodg=$row['bloodg'];
                echo "<br>
                <br>";
                echo '<h2>Welcome&nbsp&nbsp'.$name.'</h2>';
                echo '<br>';
                echo '<h3>Your patient ID is '.$pid.'</h3>';
                echo "<br>";
                
                echo ' <tr>
                <th scope="row">Name</th>
                <td>'.$name.'</td></tr>
                <tr>
                <th scope="row">Email</th>
                <td >'.$email.'</td></tr>
              
                <tr><th scope="row">Pho_no</th>
                <td >'.$phno.'</td></tr>
                <tr><th scope="row">Date of Birth</th>
                <td >'.$dob.'</td></tr>
                <tr><th scope="row">Gender</th>
                <td >'.$gender.'</td></tr>
                <tr> <th scope="row">Blood-Group</th>
                <td >'.$blodg.'</td></tr>
                
                <button class="btn btn-primary"><a href="updatedetails.php?update='.$pid.'" class="text-light">Update</a></button>';
 }
               ?>
 </table>
</body>
</html> 