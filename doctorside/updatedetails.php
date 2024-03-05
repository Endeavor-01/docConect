<?php
     include ('C:\xampp\htdocs\projectphp\dbase.php');

    $dno=$_GET['updateid'];
    $sql="SELECT * FROM doctors WHERE dno='$dno'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $name=$row['name'];
    $email=$row['email'];
    $password=$row['pass'];
    $phno=$row['phono'];
    $expertise=$row['expertise'];
    $experience=$row['experience'];
    $yop=$row['yop'];
    $price=$row['price'];
    $place=$row['place'];
    $address=$row['address'];
    $qualification=$row['qualification']; 
    $start_time=$row['start_time'];
    $end_time=$row['end_time'];
    
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


  $sql="UPDATE `doctors` SET dno = '$dno', `name`='$name', email = '$email', pass= '$password', phono = '$phno',expertise='$expertise', 
      experience='$experience',`place`='$place',`address`='$address',`yop`='$yop',`qualification`='$qualification',`price`='$price',
      `start_time`='$start_time',`end_time`='$end_time' WHERE dno ='$dno'";
   $result=mysqli_query($conn,$sql);
   if($result)
   {
    header('location:D_mydetails.php');
    }
    else{
      echo "the data not inserted<br>".mysqli_error($conn);
    }
}
?>
<!doctype html>
<html>

<head>
  <title>update info</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
    <style>
      h1{
        margin-left:15px;
      }
    label {
        font-weight: bold;
    }
    button{
      margin-left:95%;
      margin-top:10px;
    }
    .group{
      padding: 10px;
    }
    </style>
</head>

<body>
    <h1 style="text-align:center;">Edit your information</h1>
    <div class="container">
        <form method="post">
            <div class="group" style="margin-bottom:15px; margin-top: 50px;">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="enter your name" autocomplete="off"
                    value=<?php echo $name;?>>
            </div>
            <div class="group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" autocomplete="off"
                    value=<?php echo $email;?>>
            </div>
            <div class="group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" value=<?php echo $password;?>>
            </div>
            <div class="group">
                <label for="phone_number">Phone Number:</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number" autocomplete="off"
                    value=<?php echo $phno;?>>
            </div>
            <div class="group">
                <label for="time">Available Time:</label>
                <input type="time" class="form-control" id="time" name="start_time" autocomplete="off"
                    value=<?php echo $start_time;?>>
                <input type="time" class="form-control" id="time" name="end_time" autocomplete="off"
                    value=<?php echo $start_time;?>>
            </div>
            <div class="group">
                <label for="year_of_passing">Year of Passing:</label>
                <input type="date"  class="form-control" id="year_of_passing" name="year_of_passing" autocomplete="off"
                    value=<?php echo $yop;?>>
            </div>
            <div class="group" style=margin-bottom:15px;">
                <label for="price">Consulting fee:</label>
                <input type="number" class="form-control"  id="price" name="price" min="250" autocomplete="off" step="50"  value=<?php echo $price;?>>
                   
            </div>
            
                    <div class="group" style="margin-bottom:15px; margin-top:15px;">
    <label for="experience"> years of Experience:</label>
    <input type="number" class="form-control" min="1" name="experience" required value=<?php echo $experience;?>>
  </div>
            <div class="group">
                <label for="expertise">expertise:</label>
                <select class="form-control" name="expertise" id="expertise" value=<?php echo $expertise;?> ">
                    <option selected></option>
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
            </div>
           
            
  
    <div class="group">
                <label for="address">Qualifications:</label>
                <textarea id="qualification" class="form-control" name="qualification" rows="3" cols="30"
                    autocomplete="off" value=<?php echo $qualification;?>>
                    </textarea></div>
    <div class="group">
        <label for="address">Address:</label>
        <input type="radio" name="place" value="clinic" <?php echo ($place == "clinic") ? "checked" : "";?>>clinic
        <input type="radio" name="place" value="hospital" <?php echo ($place == "hospital") ? "checked" : "";?>>Hospital
        <textarea id="address" class="form-control" placeholder="enter address of clinic or hospital" name="address" value=<?php echo $address;?>
            rows="3" cols="30" ></textarea>
    </div>

    <button type="submit" class="btn btn-primary" name="submit">update</button>
    </form>
    </div>
</body>

</html>