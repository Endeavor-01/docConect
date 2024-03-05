<?php
 include 'dbase.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password=$_POST['pass'];
  $phno=$_POST['phonenumber'];
  $dob=$_POST['dob'];
  $gender=$_POST['gender'];
  $blodg=$_POST['blood'];

  $checkuser="select * from patient where email='$email'";
  $results=mysqli_query($conn,$checkuser);
  $count=mysqli_num_rows($results);
  
  if($count>0){
    echo "<script>alert('The  username already exixts! Try a different email')</script>";
  }
 //inserting data
 else{
 
     $sql="INSERT INTO `patient` ( `fname`, `email`, `password`, `phno`, `DOB`, `gender`, `bloodg`) VALUES 
      ('$name', '$email', '$password', '$phno', '$dob', '$gender', '$blodg')";

       $result=mysqli_query($conn,$sql);

 if($result)
{
  //  echo "record inserted successfully<br>";
  header("location:patientlogin.php");
} 
else{
  echo "the data not inserted<br>".mysqli_error($conn);
}
}
}
?>
<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Registration Form </title>
    
    <link rel="stylesheet" href="psignup.css" />
  </head>
  <body>
  <section class="container">
      
        <style>
           @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: right;
  padding: 50px;
  background-image: url(./IMAGES/psignup.jpg);
            /* Set the background size to cover the entire viewport */
            background-size: cover;
            /* Set the background attachment to fixed for a fixed background effect */
            background-attachment: fixed;
            /* Optional: Set background color as a fallback */
            background-color: #f4f4f4;
            /* Set additional styles as needed */
            margin: 0; /* Remove default margin */
            font-family: 'Arial', sans-serif; /* Set font family */
        }

.transparent-container {
  position: relative; 
  justify-content: right;
  max-width: 700px;
  width: 100%;
  background-color: rgba(46, 126, 180, 0.7);
  padding: 25px;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
 
    background-color: #3498db; /* Set the background color */
    opacity: 0.7; /* Set the opacity level (0.7 is an example) */
    padding: 20px;
    color: #fff; /* Set the text color */

}


.container header {
  font-size: 2.5rem;
  color: #000000;
  font-weight: 500;
  text-align: center;
}
.container .form {
  margin-top: 30px;
}
.form .input-box {
  width: 100%;
  margin-top: 20px;
}
.input-box label {
  color: #f7f3f2;
  font-size: 1.5rem;
}
.form :where(.input-box input, .select-box) {
  position: relative;
  height: 50px;
  width: 100%;
  outline: none;
  font-size: 1rem;
  color: #000000;
  margin-top: 8px;
  border: 1px solid #ddd;
  border-radius: 6px;
  padding: 0 15px;
}
.input-box input:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}
.form .column {
  display: flex;
  column-gap: 15px;
}
.form .gender-box {
  margin-top: 20px;
}
.gender-box h3 {
  color: #ffffff;
  font-size: 1.5rem;
  font-weight: 400;
  margin-bottom: 8px;
}
.form :where(.gender-option, .gender) {
  display: flex;
  align-items: center;
  column-gap: 50px;
  flex-wrap: wrap;
}
.form .gender {
  column-gap:10px;
}
.gender input {
  accent-color: rgb(130, 106, 251);
}
.form :where(.gender input, .gender label) {
  cursor: pointer;
}
.gender label {
  color: #000000;
}
.address :where(input, .select-box) {
  margin-top: 15px;
  margin-left: 10px;
}
.select-box select {
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  color: #000000;
  font-size: 1rem;
}
.form button {
  height: 55px;
  width: 100%;
  color: #ffffff;
  font-size: 1rem;
  font-weight: 400; 
  margin-top: 30px;
  border: none;
  cursor: pointer;
  transition: all 0.2s ease;
  background: rgb(2, 111, 254);
}
.form button:hover {
  background:#03fc0c ;
}

@media screen and (max-width: 500px) {
  .form .column {
    flex-wrap: wrap;
  }
  .form :where(.gender-option, .gender) {
    row-gap: 15px;
  }
}
.items{
  position: relative;
  left: -180px;
  padding: 5px;
  width: 200px;
  margin-left: -20px;
  text-align: center;
  text-transform: uppercase;
  font-weight: bold;
  cursor: pointer;
}
.blood{
  position: relative;
  top:-45px;
  text-transform: capitalize;
  font-size: 23px;
  color: #fff;
  padding-left:130px;
}
        </style>
      <header> CREATE  AN  ACCOUNT </header>
      <form action="#" class="form" method="POST">
        <div class="input-box">
          <label>Full Name</label>
          <input type="text" placeholder="Enter Full Name" name="name"  required />
        </div>

        <div class="input-box">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter Email Address" required />
        </div>

        <div class="input-box"> 
         <label>password</label>
         <input type="text" name="pass" placeholder="Enter password" required />
        </div>
        <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <input type="text" name="phonenumber" placeholder="Enter phone number" required />
          </div>
          <div class="input-box">
            <label>Birth Date</label>
            <input type="date" name="dob" placeholder="Enter birth date" required />
          </div>
        </div>

        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
            <label for="check-male">male</label>
              <input type="radio" id="check-male" value="male" name="gender" >
              
            </div>
            <div class="gender">
            <label for="check-female">Female</label>
              <input type="radio" id="check-female" value="female" name="gender" >
            
            </div>

            <p class="blood">Blood Group:</p>
            <div class="group">
               <select name="blood" class="items">
                  <option value="A+" selected>A+</option><option value="A-">A-</option>
                  <option value="B+">B+</option><option value="B-">B-</option>
                  <option value="O+">O+</option><option value="O-">O-</option>
                  <option value="AB+">AB+</option><option value="AB-">AB-</option>
                  </select>               
          </div>    
          </div>
        </div>
        
              
        <button name="register" type="submit">Register</button>
      </form>
    </section>
 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>

