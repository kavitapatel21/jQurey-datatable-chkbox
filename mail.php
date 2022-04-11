<?php
require('config.php');
$email=$_POST['memail'];

//echo $email;
$sql="select * from chkdata where ( email='$email' AND flag='1');";

      $res=mysqli_query($conn,$sql);

      if (mysqli_num_rows($res) > 0) {
        
        $row = mysqli_fetch_assoc($res);
        if($email==isset($row['email']))
        {
                echo 'false';
        }
      }
      else{
                echo 'true';
      }
?>