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
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" ></script>

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
  button{
  margin-left:90%;
}
</style>
<body>



<div class="navbar">
<a class="active" href="D_mydetails.php">My Details</a> 
<a href="D_searchpat.php"> Search Patients</a> 
  <a href="D_myappoint.php"> My Appointment</a> 
  <a href="D_logout.php" class="btn btn-danger" >Log out</a>
</div>
<h2 style="text-align:center;">MY APPOINTMENTS</h2>

<table class="table  table-striped table-hover table-bordered">
  <thead class="table-primary">
      <tr>
      <th scope="col">Appointment ID</th>
      <th scope="col">Booking Date</th>
        <th scope="col">Patient name</th>
        <th scope="col">date of appointment</th>
        <th scope="col">time of appointment</th>
        <th scope="col">Reason</th>
        <th scope="col">Details</th>
        <th scope="col">contact</th>
        <th scope="col">status</th>
   
      </tr>
    </thead>

    <tbody>

<?php
$email=$_SESSION['email'];  
$sql="SELECT * FROM `doctors`where email='$email'";
$result= mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($result){
 $row=mysqli_fetch_assoc($result);
     $dno=$row['dno'];

     $sql=" SELECT * FROM zappointments a INNER JOIN doctors ON a.dno = doctors.dno
                                     INNER JOIN patient ON a.pid=patient.pid 
                                      WHERE a.dno='$dno' ";

                                           
//   JOIN doctors d on a.dno=d.dno
//  JOIN patient p on a.pid=p.pid
        
         
$result = mysqli_query($conn,$sql);

    if($result){
      if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
        $appoint=$row['appoint_id'];
         $name=$row['fname'];
        $phono=$row['phno'];
        $bookdate=$row['bookdate'];
        $reason=$row['reason'];
        $details=$row['details'];
        $visittime=$row['visittime'];
        $visitdate=$row['visitdate'];
        $status=$row['status1'];
      
        echo'<br>';
        echo ' <tr>
        <td >'.$appoint.'</td>
     
        <th >'.$bookdate .'</th>       
         
        <td >'.$name.'</td>
        <td >'.$visitdate.'</td>
        <td >'.$visittime.'</td>
        <td >'.$reason.'</td>
        <td >'.$details.'</td>
        <td >'.$phono.'</td>
        <th >'.$status.'</th>
        
       <td> 
       <a href="checkappoint.php?complete='.$appoint.'"class="btn btn-success" id="icon" onclick="myFunction()"><i class="fa-solid fa-check fa-2xl">Completed</i></a>
       </td>
         </tr>';
        
      }
      
    } else{
      echo 'the appointment data not found';
    } 
    } else{
      echo'error:'.mysqli_error($conn).'find';
    }  }
?>
<script>
function myFunction() {
  alert("The consultion has been successfully completed");
 
}
</script>
</body>
</html>