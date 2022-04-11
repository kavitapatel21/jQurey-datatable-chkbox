<?php
// Load the database configuration file
require('config.php');
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=data.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('Id','Name', 'Email', 'Contactno'));  
    $query = "SELECT id,name,email,contactno from chkdata ORDER BY id DESC";  
    $result = mysqli_query($conn, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  
         fputcsv($output, $row);  
    }  
    echo json_encode($output); 
    fclose($output);  
?>