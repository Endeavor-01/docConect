<?php
  session_start();
  if(!isset($_SESSION['email'])){
       header('Location:projectphp\doctorlogin.php');
  }
    include ('C:\xampp\htdocs\projectphp\dbase.php');
?>

<!DOCTYPE html>
<html>
<title>My details</title>
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
  button{
  margin-left:90%;
}
</style>
<body>



<div class="navbar">
<a class="active" href="D_mydetails.php">My Details</a> 
  <a href="D_searchpat.php"> Search Patients</a> 
  <a href="D_myappoint.php"> My Appointment</a> 
  <a href="D_logout.php" class="btn btn-danger">Log out</a>
</div>

<table class="table table-striped table-hover">
    
    </thead>
    <tbody>
      <?php
      $email=$_SESSION['email'];

    $sql="SELECT * FROM `doctors` where email='$email'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    
    if($result){
   $row=mysqli_fetch_assoc($result);
       $dno=$row['dno'];
       $name=$row['name'];
       $email=$row['email'];
       $password=$row['pass'];
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
            
            echo "<br>";
            
             echo '<h2>Welcome&nbsp&nbsp'.$name.'</h2>';
             echo '<br>';
             echo '<h3> Your doctor ID is '.$dno.'</h3>'; 
             echo "<br>";

            echo ' <tr>
            <th scope="col">Name</th>
            <td >'.$name.'</td></tr>
            <tr>
            <th scope="col">Email</th>
            <td >'.$email.'</td></tr>
            
            <tr>
            <th scope="col">Phone number</th>
            <td >'.$phno.'</td></tr>
            <tr>
             <th scope="col">Expertise</th>
            <td >'.$expertise.'</td></tr>
            <tr> 
             <th scope="col">Experience</th>
            <td>'.$experince.'</td></tr>
            <tr>
             <th scope="col">Year of passing</th>
            <td >'.$yop.'</td></tr>
            <tr>
            <th scope="col">Consultancy Fee</th>
            <td >'.$price.'</td></tr>
            <tr>
            <th scope="col">Place</th>
            <td >'.$place.'</td></tr>
            <tr>
            <th scope="col">Address</th>
            <td >'.$address.'</td></tr>
            <tr>
            <th scope="col">Qualification</th>
            <td>'.$qualification.'</td></tr>
            <tr>
            <th scope="col">Start time</th>
            <td >'.$start_time.'</td></tr>
            <tr>
            <th scope="col">End time</th>
            <td >'.$end_time.'</td></tr>
            
            <button class="btn btn-primary"><a href="updatedetails.php?updateid='.$dno.'" class="text-light">Update</a></button>';
    }
    ?>
</body>
</html>