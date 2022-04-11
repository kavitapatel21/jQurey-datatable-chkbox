<?php
require('config.php');
$name=$_POST['name'];
$email=$_POST['email'];
$contactno=$_POST['contactno'];
//echo $name;
$sql="select * from chkdata where ( email='$email' AND flag='1');";

      $res=mysqli_query($conn,$sql);

      if (mysqli_num_rows($res) > 0) {
        
        $row = mysqli_fetch_assoc($res);
        if($email==isset($row['email']))
        {
                echo '<script>alert("email already exist")</script>';
        }
      }
      else{
$sql = "INSERT INTO chkdata (name,email,contactno,flag)
VALUES ('".$name."', '".$email."', '".$contactno."','1')";
$result = $conn->query($sql);
exit();
      }
?>