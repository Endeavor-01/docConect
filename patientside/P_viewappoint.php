<?php
session_start();
if(!isset($_SESSION['email'])){
  header('Location:projectphp/patientlogin.php');
  exit();
}

 include ('C:\xampp\htdocs\projectphp\dbase.php');

   
?>

<!DOCTYPE html>
<html>
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
  
</style>
<body>



<div class="navbar">
<a href="P_mydetails.php">My Details</a> 
  <a href="P_searchdoc.php"> Search Doctor</a> 
  <a href="P_bookappoint.php"> Book Appointment</a> 
  <a href="P_viewappoint.php"> View Appointment</a> 
  <a href="P_logout.php" class="btn btn-danger">Log out</a>
</div>
<h2 style="text-align:center;">MY APPOINTMENTS</h2>

<table class="table  table-striped table-hover table-bordered">
  <thead class="table-primary">
      <tr>
      <th scope="col">Appointment ID</th>
      <th scope="col">Booking Date</th>
        <th scope="col">doctors name</th>
        <th scope="col">date of appointment</th>
        <th scope="col">time of appointment</th>
        <th scope="col">Reason</th>
        <th scope="col">Details</th>
        <th scope="col">contact</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <tbody>

<?php
$email=$_SESSION['email'];  
$sql="SELECT * FROM `patient`where email='$email'";
$result= mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($result){
 $row=mysqli_fetch_assoc($result);
     $pid=$row['pid'];


  // $patient_id=$_SESSION['pid'];
  //
$sql=" SELECT * FROM zappointments a INNER JOIN doctors ON a.dno = doctors.dno
                                     INNER JOIN patient ON a.pid=patient.pid 
                                      WHERE a.pid='$pid'";

                                           
//   JOIN doctors d on a.dno=d.dno
//  JOIN patient p on a.pid=p.pid
        
         
$result = mysqli_query($conn,$sql);

    if($result){
      if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
        $appoint=$row['appoint_id'];
         $name=$row['name'];
        $phono=$row['phono'];
        $bookdate=$row['bookdate'];
        $reason=$row['reason'];
        $details=$row['details'];
        $visittime=$row['visittime'];
        $visitdate=$row['visitdate'];
      echo'
      <br>';

        echo ' <tr>
        <td >'.$appoint.'</td>
     
        <th >'.$bookdate .'</th>       
        
        <td >DR.&nbsp'.$name.'</td>
        <td >'.$visitdate.'</td>
        <td >'.$visittime.'</td>
        <td >'.$reason.'</td>
        <td >'.$details.'</td>
        <td >'.$phono.'</td>
       <td> <a href="Cancel.php?cancel='.$appoint.'"class="btn btn-danger" onclick="myFunction()">CANCEL BOOKING</a></td>
         </tr>';
        
      }
      
    } else{
      // echo 'the appointment data not found';
    } 
    } else{
      echo'error:'.mysqli_error($conn).'fin';
    }  }
?>

<script>
function myFunction() {
  alert("The Booking has been cancelled");
}
</script>
 </tbody>
    </table>
   
</body>
</html> 