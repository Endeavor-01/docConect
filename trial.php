<!-- <?php
// include 'dbase.php';



// if(isset($_GET['book'])){
//     $dno=$_GET['book'];


//     $bookdate=$_POST['bookdate'];
//     $visitdate=$_POST['visitdate'];
//     $visittime=$_POST['visittime'];
//     $reason=$_POST['reason'];
//     $details=$_POST['details']; 

//     $sql="INSERT INTO `zappointments` (`docno`, `patid`, `bookdate`, `visittime`, `visitdate`, `reason`, `details`) 
//     VALUES ('20', '','$bookdate', '$visittime', '$visitdate', ' $reason ', '$details ')";

//      $result=mysqli_query($conn,$sql);

//      if($result)
//      {
//          echo "appoint booked successfully<br>";
         
//      }
//      else{
//        echo "the data not inserted<br>".mysqli_error($conn);
//      }


//  }
//         ?>


if($_SERVER['REQUEST_METHOD']=='POST')
         {
             $bookdate=$_POST['bookdate'];
             $visitdate=$_POST['visitdate'];
             $visittime=$_POST['visittime'];
             $reason=$_POST['reason'];
             $details=$_POST['details']; 

           $checktime="select d.dno,a.docno from zappointments a,doctors d where visittime=' $visittime' and a.docno =d.dno  ";
           $results=mysqli_query($conn,$checktime);
           $count=mysqli_num_rows($results);
           
           if($count>0){
             echo "The doctor is not available at that time please try for anothe time slot";
           }
           else{
            $sql="INSERT INTO `zappointments` (  `docno`, `patid`,`bookdate`, `visittime`, `visitdate`, `reason`, `details`)
             VALUES ( '', '','$bookdate', '$visittime', '$visitdate', ' $reason ', '$details ')";
  
       
         $result=mysqli_query($conn,$sql);
         if($result)
         {
             echo "appoint booked successfully<br>";
             
         }
         else{
           echo "the data not inserted<br>".mysqli_error($conn);
         }


        }
        
         }


         <?php echo '<input type="hidden" name="pat_id" value='.$_GET["book"].'>';?>
         value='.$_GET["pat"].'>

         <a href="P_bookappoint.php?book='.$dno.';&pat='.$pid.'; " class="btn btn-primary" >BOOK NOW</a>

         <a href="P_bookappoint.php?book=<?php echo $dno;?> &pat=<?php echo $pid;?> " class="btn btn-primary" >BOOK NOW</a>

         "<script>alert('Your details are forwarded to the admin for approval.Please wait for confirmation.Go back to to login page 
                  and login after few minutes ') </script>";

                  $name=$row['name'];
  $phono=$row['phono'];
  <td >'.$name.'</td>
  <td >'.$phono.'</td>            -->



  // $sql="INSERT INTO `zappointments` ( `bookdate`, `visittime`, `visitdate`, `reason`, `details`) 
  // VALUES ('$bookdate', '$visittime', '$visitdate', ' $reason ', '$details ')";

  // $sql="INSERT INTO `zappointments` ( `dno`, `bookdate`, `visittime`, `visitdate`, `reason`, `details`, `status`, `remarks`)
  //    VALUES ( '', '$bookdate','$visittime', '$visitdate', ' $reason ', '$details ', '', '')";
  //  $result=mysqli_query($conn,$sql);
  // &pat='.$pid.';
________--------_________________---------------_______________-____-----------__-___----_____----____----____------


  

  <div class="container my-3">
               <table class="table  table-striped table-hover table-bordered">

 <?php


 
    $sql="SELECT * FROM `patient`";
    $result= mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($result){
     $row=mysqli_fetch_assoc($result);
     $pid=$row['pid'];

       if(isset($_POST['search'])){
       

        $sql1=" SELECT * FROM zappointments a INNER JOIN doctors ON a.dno = doctors.dno
        INNER JOIN patient ON a.pid=patient.pid 
         WHERE a.pid='$pid'";

           $result1 = mysqli_query($conn,$sql1);

    if($result1){
      if(mysqli_num_rows($result1)>0){
        echo ' <thead>
          <tr>
          <th>  patient ID </th>
          <th> Name </th>
          <th> treatment done </th>
          <th>  Treatment for  </th>
          <th> previously consulted by </th>
          </tr>
         </thead>';
      while($row=mysqli_fetch_assoc($result1)){
        $pid=$row['pid'];
         $fname=$row['fname'];     
       $reason=$row['reason'];
        $details=$row['details'];
        $name=$row['name'];
       
      

        echo ' <tr>   
        <th >'.$pid .'</th>         
        <td >'.$fname.'</td>
        <td >'.$reason.'</td>
        <td >'.$details.'</td>      
        <td >'.$name.'</td>
        </tr>';

       }  
 }}
}
       }
       
?>


<script>
function myFunction() {
  var txt;
  if (confirm(" doctor approved")) { 
  }
}
</script>
<script>
function myFunction() {
  var txt;
  if (confirm("doctor declined")) { 
  }
}
</script>