<?php
 include 'dbase.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Registration Portal</title>
    <!-- <link rel="stylesheet" href="docsignup.css"> -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</head>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    
}

body {
    font-family: "Poppins", sans-serif;
    background-image: url(./IMAGES/trial.jpg);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: right;
    padding: 50px;
    background-size: cover;
    background-attachment: fixed;
      /* Optional: Set background color as a fallback */
    background-color: #ebf0f4;
              /* Set additional styles as needed */
    margin: 0; /* Remove default margin */
      font-family: 'Arial', sans-serif; /* Set font family */
            }

.container {
    max-width: 700px;
    margin: 20px auto;
    margin-right: 50%;
    background-color: transparent;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 20px;
}

.container h1 {
    font-size: 24px;
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

.group {
    margin-bottom: 20px;
}

.group label {
    font-size: 16px;
    font-weight: 500;
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.group input,
.group textarea,
.group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    
}

.group textarea {
    resize: vertical;
}

.group select {
    appearance: none;
    padding-right: 30px;
    
}

.group i {
    position: relative;
    right: -610px;
    top: 50%;
    bottom: 20px;
    transform: translateY(-50%);
    font-size: 25px;
    color: #151313;
}

.place {
    margin-bottom: 20px;
    font-weight: bold;
}

.place input[type="radio"] {
    margin-right: 5px;
}

.but {
    text-align: center;
    margin-top: 20px;
}

button.submit {
    background-color: #2897dc;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button.submit:hover {
    background-color: #00fc32;
}

.but p {
    margin-top: 15px;
    font-size: 14px;
}

.but p a {
    color: #200ae4;
    text-decoration: none;
    font-weight: 600;
}

.but p a:hover {
    text-decoration: underline;
}
</style>
<body>
<div class="container">
        <div class ="tittle">
            <h1>DOCTOR'S REGISTRATION </h1>
        </div>
        <form action="#" method="POST">
            <div class="user-details">
                <div class="group">
                    <label for="full_name">Full Name:</label>
                    <input type="text" id="name" name="name" autocomplete="off" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" autocomplete="off" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <i class='bx bxs-lock'></i>
                </div>
                <div class="group">
                    <label for="phone_number">Phone Number:</label>
                    <input type="tel" id="phone_number" name="phone_number" autocomplete="off" required>
                    <i class='bx bx-phone-call'></i>
                </div>

                <div class="group">
                    <label for="experience"> Years of Experience:</label>
                    <input type="number" min="0" name="experience" required>
                </div>

                <div class="group">
                    <label for="time">Available Time:</label>
                    <input type="time" id="time" name="start_time"  autocomplete="off" required>
                    <input type="time" id="time" name="end_time"  autocomplete="off" required>
                </div>
                <div class="group">
                    <label for="year_of_passing">Year of Passing:</label>
                    <input type="date" id="year_of_passing" name="year_of_passing" autocomplete="off" required>
                </div>
                <div class="group">
                    <label for="price">Consulting fee:</label>
                    <input type="number" id="price" name="price" min="300" step="100" autocomplete="off" required>
                   
                </div>
                <div class="group">
                    <label for="address">Qualifications:</label>
                    <textarea id="qualification" name="qualification" rows="2" cols="49" autocomplete="off"
                        required></textarea>
                </div>
                <div class="group">
                    <label for="expertise">expertise:</label>
                    <select name="expertise" id="expertise" placeholder="EX: cardiologist ">
                        <option value="1"></option>
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
                        <option value="Pediatrician">Pediatrician</option>
                        <option value="Orthopedist">Orthopedist</option>
                        <option value="Ophthalmologist">Ophthalmologist</option>
                        <option value="Oncologist">Oncologist</option>
                        <option value="Urologist">Urologist</option>
                        <option value="Neurology">Neurology</option>
                    </select>
                </div>
            </div>
            <div class="place">
                <label for="address" style="padding-bottom:5px;">Address:</label>
                <input type="radio" name="place" value="clinic" required>clinic
                <input type="radio" name="place" value="hospital" required>Hospital
                <textarea id="address" placeholder="ENTER ADDRESS" name="address" rows="4"
                    cols="86" required></textarea>
            </div>
            <div class="but">
                <button name="register" class="submit">Register</button>
                <p>Already have an account? <a href="./doctorlogin.html">Log In</a></p>
        </form>

</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
      
      <?php 
      if($_SERVER['REQUEST_METHOD']=='POST')
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password=$_POST['password'];
  $phno=$_POST['phone_number'];
  $expertise=$_POST['expertise'];
  $experience=$_POST['experience'];
  $yop=$_POST['year_of_passing'];
  $place=$_POST['place'];
  $address=$_POST['address'];
  $qualification=$_POST['qualification'];
  $start_time=$_POST['start_time'];
  $end_time=$_POST['end_time'];
  $price=$_POST['price'];
 

  $checkuser="SELECT * FROM `doctors` WHERE  email='$email'";
  $result=mysqli_query($conn,$checkuser);
  $count=mysqli_num_rows($result);
  
  if($count==1){
    echo " <script>alert('username already exists ') </script>";
    }
  else{
    $sql="INSERT INTO `doctors` (`name`, `email`, `pass`, `phono`, `expertise`, `experience`, `place`, `address`, `yop`, `qualification`,`price`,`start_time`,`end_time`)
            VALUES  ('$name', '$email', '$password', '$phno', '$expertise','$experience','$place', '$address', '$yop','$qualification', '$price','$start_time','$end_time')";

     $result=mysqli_query($conn,$sql);

    if($result){
        
     echo ' <script>alert("Your details are forwarded to the admin for approval.Please wait for confirmation.Go back to to login page and login after few minutes ");</script>';

   }
   else{
     echo "the data not inserted<br>".mysqli_error($conn);
   }
}
 }
 ?>

</body>
</html>