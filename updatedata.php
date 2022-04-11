<?php
require('config.php');
$id = 0;
//echo $id;
$name = mysqli_escape_string($conn,$_POST['name']);
$email = mysqli_escape_string($conn,$_POST['email']);
$contactno = mysqli_escape_string($conn,$_POST['contactno']);
//echo $name;
//echo $email;
//echo $contactno;

 if(isset($_POST['id'])){
     $id = mysqli_escape_string($conn,$_POST['id']);
 }
 

    $query= mysqli_query($conn,"UPDATE chkdata SET name='".$name."',email='".$email."',contactno='".$contactno."' WHERE id=".$id);
     $result = $conn->query($query);
     exit();
 
     ?>
