<?php
    include ('C:\xampp\htdocs\projectphp\dbase.php');

    $pid=$_GET['update'];
$sql="SELECT * FROM patient WHERE pid='$pid'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
             $name=$row['fname'];
            $email=$row['email'];
             $password=$row['password'];
             $phno=$row['phno'];
             $dob=$row['DOB'];
             $gender=$row['gender'];
             $bloodg=$row['bloodg'];
if($_SERVER['REQUEST_METHOD']=='POST'){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password=$_POST['password'];
  $phno=$_POST['phno'];
  $dob=$_POST['DOB'];
  $gender=$_POST['gender'];
  $blodg=$_POST['blood'];
  $sql="UPDATE `patient` SET pid='$pid',fname = '$name', email = '$email', password= '$password', phno = '$phno',DOB='$dob', 
  gender='$gender',bloodg= '$blodg' WHERE pid='$pid'";
  $result=mysqli_query($conn,$sql);

 if($result)
{
  header('location:P_mydetails.php');
}
else{
  echo "the data not updated<br>".mysqli_error($conn);
}
}
?>

<!doctype html>
<html>

<head>
<title>patients page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
    <style>
        h1{
            margin-left:35px;
        }
    </style>
</head>

<body>
    <h1 style="text-align:center;">Edit your information</h1>
    <div class="container">
        <form method="post">
            <div class="form groups" style="margin-bottom:15px; margin-top: 50px;">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="enter your name" autocomplete="off"
                    value=<?php echo $name;?>>
            </div>
            <div class="form groups">
                <label>Email</label>
                <input type="email" class="form-control" name="email" autocomplete="off" value=<?php echo $email;?>>
            </div>
            <div class="form groups">
                <label>Password</label>
                <input type="password" class="form-control" name="password" value=<?php echo $password;?>>
            </div>
            <div class="form groups">
                <label>Phone number</label>
                <input type="text" class="form-control" name="phno" autocomplete="off" value=<?php echo $phno;?>>
            </div>
            <div class="form groups" style="margin-bottom: 15px;">
                <label>Date of birth</label>
                <input type="date" class="form-control" name="DOB" placeholder="enter date of birth" autocomplete="off"
                    value=<?php echo $dob;?>>
            </div>
            <div class="form groups" style="margin-bottom: 15px;">
                <label>Gender</label>
                <input type="radio" name="gender" style="margin-left: 10px;" value="male" <?php echo ($gender == "male") ? "checked" : "";?>>Male
                <input type="radio" name="gender" style="margin-left: 5px;" value="female" <?php echo ($gender == "female") ? "checked" : "";?>>Female
                <!-- <?php include 'radio_value.php'; ?> -->
            </div>
            <div class="form groups" style="margin-bottom: 15px;">
                <label for="blood">Blood-Group</label>
                <select name="blood" value=<?php echo $bloodg;?>>
                    <option value="A+" selected>A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select><br>
                <button type="submit" class="btn btn-primary" name="+" style="margin-top: 15px;">Update</button>
        </form>
    </div>
</body>

</html>










