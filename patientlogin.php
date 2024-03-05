<?php
include 'dbase.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Patient- Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
   

</head>

<style>
body {
    font-family: 'Arial', sans-serif;
    background-image: url(./IMAGES/Plogin.jpg);
    background-size: cover;
    background-position: right;
    height: 100vh;
    display: flex;
    justify-content: left; /* Change from 'left' to 'right' */
    align-items: center;
    margin-right: 280px;
    margin-left: 280px;
}

.transparent .login-container {
    background-color: rgba(255, 255, 255, 0.5); /* Adjust the alpha value for transparency */
    padding: 20px;
    margin-top: 100px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    width: 300px;
}

.lo {
    text-align: center;
    margin-bottom: 20px;    
}

.form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

input {
    padding: 10px;
    width: 100%;
    border-radius: 5px;
    border: none;
    margin-top: 10px;
}

button {
    background-color: #007bff;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
    width: 160px;
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: 1px;
    margin-left:60px;
}

button:hover {
    background-color: #03fc0c;
}

p {
    margin-top: 20px;
    text-align: center;
    color: #555;
}

a {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}
</style>
<body>
    <div class="login-container">
    <?php
    $login=false;


if($_SERVER['REQUEST_METHOD']=='POST')
{
    $email = $_POST['email'];
    $password=$_POST['password'];

 $sql="SELECT * from patient where email='$email' AND password='$password'";
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
  
  if($num>0){
  $login=true;
  
  session_start();
 
  $_SESSION['email']="$email";
  $_SESSION['pid']=$pid;

  header("location:patientside/P_mydetails.php");
}
else{
    echo "<div class='' role='alert'>
            
            </div>";
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
        <h1 class="lo">Login to docConnect</h1>
        <form action="#" method="POST" style="margin-left:60px;">
            <div class="form-group" >
                <label for="username">Email</label><br>
                <input type="text" id="email" name="email" autocomplete="on" required>
            </div>
            <div class="form-group" style="padding:10px; margin-right:30px;">
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" autocomplete="off" required>
            </div>
            <button type="submit">Login</button>
            <p>If not registered <a href="spatient_ins.php">sign In</a></p>
        </form>
     </body>
</html>