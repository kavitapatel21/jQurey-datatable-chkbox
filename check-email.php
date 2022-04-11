<?php
require('config.php');
$id = 0;
//echo $id;

$email = mysqli_escape_string($conn,$_POST['email']);


//echo $email;
 if(isset($_POST['id'])){
     $id = mysqli_escape_string($conn,$_POST['id']);
 }
 $sql="select * from chkdata where ( email='$email' AND flag='1');";

 $res=mysqli_query($conn,$sql);

 if (mysqli_num_rows($res) > 0) {
   
   $row = mysqli_fetch_assoc($res);
   if($email==isset($row['email']))
   {
          echo "false";
   }
 }
 else{

   echo "true";
 }
     ?>
