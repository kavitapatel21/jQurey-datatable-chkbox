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

$record = mysqli_query($conn,"SELECT * FROM chkdata WHERE id=".$id);

$response = array();

if(mysqli_num_rows($record) > 0){
    $row = mysqli_fetch_assoc($record);
    $response = array(
        "name" => $row['name'],
        "email" => $row['email'],
        "contactno" => $row['contactno'],
    );

    echo json_encode( array("status" => 1,"data" => $response) );
    exit;
}else{
    echo json_encode( array("status" => 0) );
    exit;
}

?>