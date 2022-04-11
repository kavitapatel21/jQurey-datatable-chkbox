<?php
require('config.php');
$id  = $_POST["id"];

$sql = "UPDATE chkdata SET flag=0 WHERE id =".$id ;
$result = $conn->query($sql);
?>
