
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
  <h2 >Appointment Dashboard</h2>

  <table class="table  table-striped table-hover table-bordered">
  <thead class="table-primary">
      <tr>
      <th scope="col">Appointment ID</th>
      <th scope="col">Patient name</th> 
        <th scope="col">doctor name</th>     
        <th scope="col">date of appointment</th>
        <th scope="col">time of appointment</th>
        <th scope="col">patient contact</th>        
        <th scope="col">Consultancy Fee</th>
        <th scope="col">Doctors contact</th>
        <th scope="col">status</th>
        
      </tr>
    </thead>

    <tbody>

<?php

$sql=" SELECT * FROM zappointments a INNER JOIN doctors ON a.dno = doctors.dno
                                     INNER JOIN patient ON a.pid=patient.pid ";

    $result = mysqli_query($conn,$sql);

    if($result){
      if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
        $appoint=$row['appoint_id'];
         $name=$row['name'];
         $fname=$row['fname'];
        $phono=$row['phono'];
        $status=$row['status1'];
       $price=$row['price'];
       $phno=$row['phno'];
        $visittime=$row['visittime'];
        $visitdate=$row['visitdate'];
      

        echo ' <tr>
        <td >'.$appoint.'</td> 
        <td >'.$fname.'</td>        
        <td >DR.&nbsp'.$name.'</td>
        <td >'.$visitdate.'</td>
        <td >'.$visittime.'</td>
        
        <td >'.$phno.'</td>
        <td >'.$price.'</td>
        <td >'.$phono.'</td>
        <td >'.$status.'</td>
        
         </tr>';
      }}
    } 
      ?>
      <script>
function myFunction() {
  alert("The Appointment has been removed ");
  
}
</script>
</body>

</html>