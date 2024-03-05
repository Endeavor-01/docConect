<?php
include 'dbase.php';

 //creating patient table 
$sql= "CREATE TABLE `patient` (`pid` INT(10) NOT NULL AUTO_INCREMENT , `fname` VARCHAR(20) NOT NULL , `email` VARCHAR(50) NOT NULL ,passwords VARCHAR(20),
             `phno` INT(10) NOT NULL , `DOB` DATE NOT NULL , `gender` CHAR(6) NOT NULL , `bloodg` VARCHAR(5) NOT NULL , PRIMARY KEY (`pid`))";
 $result=mysqli_query($conn,$sql);
 if($result)
{
  echo "the table created successfully<br>";
}
else{
  echo "the table not created<br>".mysqli_error($conn);
}
 //creating doctors table 
 $sql="CREATE TABLE `doctors` (`dno` INT(10) NOT NULL AUTO_INCREMENT , `name` VARCHAR(20) NOT NULL , `email` VARCHAR(50) NOT NULL , `price` VARCHAR(20) NOT NULL,
 `pass` VARCHAR(20) NOT NULL , `phono` INT(10) NOT NULL , `expertise` VARCHAR(20) NOT NULL , `experience` VARCHAR(15) NOT NULL , `qualification` VARCHAR(90) NOT NULL,
 `start_time` VARCHAR(20) NOT NULL,`end_time` VARCHAR(20) NOT NULL,`status` VARCHAR(20) NOT NULL,`place` VARCHAR(20) NOT NULL
 `address` VARCHAR(50) NOT NULL , `yop` DATE NOT NULL , PRIMARY KEY (`dno`))";
$results=mysqli_query($conn,$sql);
 if($results)
{
  echo "the table created successfully";
}
else{
  echo "the table not created".mysqli_error($conn);
}



$sql="CREATE TABLE `docconnect`.`zappointments` (`appointid` INT(10) NOT NULL AUTO_INCREMENT , `pid` INT(10) NOT NULL , `dno` INT(10) NOT NULL ,
 `bookdate` DATE NOT NULL , `visitdate` DATE NOT NULL , `visittime` DATETIME(6) NOT NULL , `reason` VARCHAR(50) NOT NULL ,
  `details` INT(100) NOT NULL , `remarks` INT(100) NOT NULL , `status` INT(20) NOT NULL ;  ALTER TABLE `zappointments` 
  ADD CONSTRAINT `zappointments_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `patient`(`pid`)  ON DELETE CASCADE ON UPDATE CASCADE";

$resultss=mysqli_query($conn,$sql);
 if($resultss)
{
  echo "the table created successfully";
}
else{
  echo "the table not created".mysqli_error($conn);
}
?>
