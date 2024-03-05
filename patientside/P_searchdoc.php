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
      background-color: #0096f3;
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

      background-color: #0096f3;
    }

    .d-flex {
      width: 50%;
      margin-left: 25%;
      margin-top: 50px;
    }
  </style>
</head>

<body>
  <div class="navbar">
    <a  href="P_mydetails.php">My Details</a>
    <a href="P_searchdoc.php"> Search Doctor</a>
    <a href="P_bookappoint.php"> Book Appointment</a>
  <a href="P_viewappoint.php"> View Appointment</a>
    <a href="P_logout.php" class="btn btn-danger">Log out</a>
  </div>

  <form class="d-flex" method="post">
  <select class="form-control" name="search" id="search" >
                    <option value="" disabled selected>SEARCH FOR A DOCTOR</option>
                    <option value="Allergist">Allergist</option>
                    <option value="Cardiologist">Cardiologist</option>
                    <option value="Dermatologist">Dermatologist</option>
                    <option value="Dietitian/Dietician">Dietitian/Dietician</option>
                    <option value="Dentist">Dentist</option>
                    <option value="ENT Specialists">ENT Specialists</option>
                    <option value="Gastroenterologist">Gastroenterologist</option>
                    <option value="Gynecologist">Gynecologist</option>
                    <option value="Family Physicians">Family Physicians</option>
                    <option value="Psychiatrists">Psychiatrists</option>
                    <option value=" Pediatrician"> Pediatrician</option>
                    <option value="Orthopedist">Orthopedist</option>
                    <option value="Ophthalmologist">Ophthalmologist</option>
                    <option value="Oncologist">Oncologist</option>
                    <option value="Urologist">Urologist</option>
                    <option value="Neurology">Neurology</option>
                </select>
  
    <button class="btn btn-success" name="submit"> Search</button>
  </form>

  <div class="container my-3">
    <table class="table  table-striped table-hover table-bordered">
      <?php
      $email=$_SESSION['email'];  
      $sql="SELECT * FROM `patient`where email='$email'";
      $result= mysqli_query($conn,$sql);
      $num = mysqli_num_rows($result);
      if($result){
       $row=mysqli_fetch_assoc($result);
           $pid=$row['pid'];
       
                   if(isset($_POST['submit'])){
                    $search=$_POST['search'];

                    $sql="SELECT * FROM `doctors` WHERE expertise ='$search' ORDER BY price DESC";
                   $result=mysqli_query($conn,$sql);
                   if($result){
                 if(mysqli_num_rows($result)>0){
                    echo  '<thead>
                       <tr>                         
                       <th scope="col">Doc.no</th>
                       <th scope="col">Name</th>
                       <th scope="col">Email</th>
                       
                       <th scope="col">Phone.no</th>
                       <th scope="col">Expertise</th>
                       <th scope="col">Experience</th>
                       <th scope="col">Year of passing</th>
                       <th scope="col">Place</th>
                       <th scope="col">Fee</th>
                       <th scope="col">Address</th>
                       <th scope="col">Qualification</th>
                       <th scope="col">Available time</th>
                       
                       <th scope="col">Actions</th>
                        </tr>
                      </thead>';
                       while( $row=mysqli_fetch_assoc($result)){
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
            
                        echo '
                          <tr>
                         
                          <th scope="row">'.$dno .'</th>
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
            
         <a href="P_bookappoint.php?book='.$dno.'&pid='.$pid.' " class="btn btn-primary" >BOOK NOW</a>
                     </tr>';
                                    
                       }                    
                      }else{
                        echo'<div class="alert alert-danger" role="alert">
                                 SEARCH NOT FOUND!!!!
                               </div>';
                     }
                    } 
                    }
                  }
                  
?>
    </table>
  </div>
</body>

</html>




















