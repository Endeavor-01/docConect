<?php   
session_start();
if(!isset($_SESSION['email'])&&!isset($_SESSION['pid'])){
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
  .signup-container{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top:100px;
  }
  label{
    font-weight: bold;
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

<?php
//    $email=$_SESSION['email'];  
// $sql="SELECT * FROM `patient`where email='$email'";
// $result= mysqli_query($conn,$sql);
// $num = mysqli_num_rows($result);
// if($result){
//  $row=mysqli_fetch_assoc($result);
//      $pid=$row['pid'];
   

   if(isset($_GET['book_no'])){ 
  //  
  // $pid=$_SESSION['pid'];        

  if($_SERVER['REQUEST_METHOD']=='GET')
  {
    if(isset($_GET['pat_id'])){
               $pid=$_GET['pat_id'];
    
    try{
    $set="SET FOREIGN_KEY_CHECKS = 0";
    $results=mysqli_query($conn,$set);
    $dno=$_GET['book_no'];
     $pid=$_GET['pat_id'];
  $bookdate=$_GET['bookdate'];
  $visitdate=$_GET['visitdate'];
  $visittime=$_GET['visittime'];
  $reason=$_GET['reason'];
  $details=$_GET['details'];
 
  $sql=" INSERT INTO `zappointments` ( `dno`,`pid`, `bookdate`, `visittime`, `visitdate`, `reason`, `details`)
   VALUES ('$dno','$pid','$bookdate', '$visittime', '$visitdate', ' $reason ', '$details' )";


   $result=mysqli_query($conn,$sql);
   if($result)
   {
       echo '<div class="alert alert-success" role="alert">
       YOUR APPOINTMENT BOOKED SUCCESSFULLY!       
               </div>';
   }
   else{
     echo "the data not inserted<br>".mysqli_error($conn);
   }
  }
  catch(Exception $e)
  {
    
  }
  }}}?>




<div class="signup-container" >
        <form action="P_bookappoint.php" method="get">
            <div class="user details"> 
            <?php echo '<input type="hidden" name="book_no" value='.$_GET["book"].'>';?>
            <?php if(isset($_GET['pid'])){
              $pat = htmlspecialchars($_GET['pid']);
            echo '<input type="hidden" name="pat_id" value="'.$pat.'">';}?>
           <div class="mb-3">
                <label for="bookdate">Booking Date</label>
                <input type="date" id="bookdate" name="bookdate" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="visitdate">Appointment Date</label>
                <input type="date" id="visitdate" name="visitdate" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="visittime">Visit Time</label>
                <input type="time" id="visittime" name="visittime" class="form-control" required>
            </div> 
           <div class="mb-3">
                <label for="visitdate">Reason</label>
                <input type="text" placeholder="State the Reason" id="reason" name="reason" row="5" cols="9" class="form-control"required>
            </div>
            <div class="mb-3">
        <textarea name ="details" id="details"  rows="5" cols="40" placeholder="Describe it in Details" class="form-control"required></textarea>
      
            </div>
            
             <div>
           <button type="submit" name="book" style="margin-left:80px;" class="btn btn-primary">Book Apppointment</button> 
           
</form>
</div>
</div>
      
</body>
</html>