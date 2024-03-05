<?php
  session_start();
  if(!isset($_SESSION['email'])){
       header('Location:projectphp\doctorlogin.php');
  }
    include ('C:\xampp\htdocs\projectphp\dbase.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
    <title>doctors page</title>
</head>
<body>
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
  .d-flex {
      width: 50%;
      margin-left: 25%;
      margin-top: 50px;
    }


</style>
<body>



<div class="navbar">
  <a class="active" href="D_mydetails.php">My Details</a> 
  <a href="D_searchpat.php"> Search Patients</a> 
  <a href="D_myappoint.php"> My Appointment</a> 
  <a href="D_logout.php" class="btn btn-danger">Log out</a>
</div>
<!-- <h1><u>search patiets</u></h1> -->

<form class="d-flex" method="post">
<input class="form-control me-2"  placeholder="ENTER PATIENT NAME " name="search" id="search" >
    <button class="btn btn-success" name="submit"> Search</button>
  </form>


  <div class="container my-3">
    <table class="table  table-striped table-hover table-bordered">


      <?php
      if(isset($_POST['submit'])){
        $search=$_POST['search'];

        $sql="SELECT * FROM `patient` WHERE  fname='$search' ";
        $result=mysqli_query($conn,$sql);
        if($result){
      if(mysqli_num_rows($result)>0){
          echo '<br>
                       <br> ';
                       echo '<h2 style="text-align: center";> PATIENT DETAILS</h2>';
          echo ' <thead>
          <tr>
          <th>  Name </th>
          <th> Email </th>
          <th>  Phone Number </th>
          <th>  DOB </th>
          <th>  Gender </th>
          <th>  Blood Group </th>
          
          </tr>
        </thead>';
        while( $row=mysqli_fetch_assoc($result)){
          $pid=$row['pid'];
          $name= $row['fname'];
          $email= $row['email'];
          $phno=$row['phno'];
          $dob=$row['DOB'];
          $gender=$row['gender'];
          $blodg=$row['bloodg'];
          
          echo ' <tr>
          <td>'.$name.'</td>
          <td>'.$email.'</td>
          <td>'.$phno.'</td>
          <td>'.$dob.'</td>
          <td>'.$gender.'</td>
          <td>'.$blodg.'</td>         
          </tr>';
        } 
         } else{
            echo'<div class="alert alert-danger" role="alert">
                     SEARCH NOT FOUND!!!!
                   </div>';
         
        }} 
?>
<div class="container my-3">
<table class="table  table-striped table-hover table-bordered">
<?php
        

        $sql1=" SELECT * FROM zappointments a INNER JOIN doctors ON a.dno = doctors.dno
        INNER JOIN patient ON a.pid=patient.pid 
         WHERE a.pid='$pid' and status1 = 'completed'";

           $result1 = mysqli_query($conn,$sql1);

    if($result1){
      if(mysqli_num_rows($result1)>0){
        echo '<br>
        <br> ';
       echo '<h2 style="text-align: center";>TREATMENT HISTORY</h2>';
        echo ' <thead>
          <tr>
          <th>  patient ID </th>
          <th> Name </th>
          <th> treatment done </th>
          <th>  Treatment for  </th>
          <th> previously consulted by </th>
          </tr>
         </thead>';
      while($row=mysqli_fetch_assoc($result1)){
        $pid=$row['pid'];
         $fname=$row['fname'];     
       $reason=$row['reason'];
        $details=$row['details'];
        $name=$row['name'];
       
      

        echo ' <tr>   
        <th >'.$pid .'</th>         
        <td >'.$fname.'</td>
        <td >'.$reason.'</td>
        <td >'.$details.'</td>      
        <td >DR.&nbsp'.$name.'</td>
        </tr>';

       }  
 }}
}  

?>
              
</body>
</html>