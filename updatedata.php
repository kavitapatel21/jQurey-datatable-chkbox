<?php
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "chkex"; /* Database name */

$conn = mysqli_connect($host, $user, $password,$dbname);
$id = 0;

 if(isset($_POST['id'])){
     $id = mysqli_escape_string($conn,$_POST['id']);
 }

//echo $id;
$name = mysqli_escape_string($conn,$_POST['name']);
$email = mysqli_escape_string($conn,$_POST['email']);
$contactno = mysqli_escape_string($conn,$_POST['contactno']);
//echo $name;
//echo $email;
//echo $contactno;
    $query= mysqli_query($conn,"UPDATE chkdata SET name='".$name."',email='".$email."',contactno='".$contactno."' WHERE id=".$id);
     $result = $conn->query($query);
     exit();
     ?>
