<?php
      $host = "localhost"; /* Host name */
      $user = "root"; /* User */
      $password = ""; /* Password */
      $dbname = "chkex"; /* Database name */
      
$conn = mysqli_connect($host, $user, $password,$dbname);
$name=$_POST['name'];
$email=$_POST['email'];
$contactno=$_POST['contactno'];
echo $name;
$sql = "INSERT INTO chkdata (name,email,contactno)
VALUES ('".$name."', '".$email."', '".$contactno."')";
$result = $conn->query($sql);
exit();
?>