<?php
      $host = "localhost"; /* Host name */
      $user = "root"; /* User */
      $password = ""; /* Password */
      $dbname = "chkex"; /* Database name */
      
$conn = mysqli_connect($host, $user, $password,$dbname);

$email=$_POST['memail'];

//echo $email;
$sql="select * from chkdata where ( email='$email');";

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