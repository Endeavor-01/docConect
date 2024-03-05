<?php
include ('C:\xampp\htdocs\projectphp\dbase.php');
$login=false;

if($_SERVER['REQUEST_METHOD']=='POST')
{
 $email=$_POST['email'];
 $password=$_POST['password'];

 $sql="SELECT * from admin where email='$email' AND password='$password'";
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
  if($num==1){
  $login=true;
  session_start();

  $_SESSION['email']="$email";
  header("location:adminside/A_adminboard.php");
}
else{
    // echo "invalid credentials";
}

    if($login)
  {
     echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>login successful</strong>.
     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
   </div> <br>";
   }
   else{
     echo "<div class='alert alert-danger' role='alert'>
             Inccorect login details
            </div>".mysqli_error($conn);
   }
  }
 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Admin login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
  </head>
  <style>
   .container{
  justify-content: flex-start ;
}

/* Full-width input fields */
  input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
 
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

button {
  background-color: #04AA6D;
  color: #f1f1f1;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  margin-right: 10px;
 
  
}

button:hover {
  background-color:#48e60e ;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #cc1515;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  
}

/* Add padding to container elements */
.container {
  padding: 16px;
}



/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
    width: 100%;
  }
}


  </style>
  <body>
    <form action="adminlogin.php" style="border:1px solid #ccc" method="POST">
        <div class="container">
          <h1>ADMIN'S LOGIN</h1>
          
          <hr>
      
          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" autocomplete="off" required>
      
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>    
          <div class="clearfix">
            <button type="submit" class="signupbtn">Sign Up</button>
            <button type="button" class="cancelbtn">Cancel</button>
            
          </div>
        </div>
      </form>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
  </body>
</html>