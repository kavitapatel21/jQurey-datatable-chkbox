<?php
// Load the database configuration file
        $db_host = 'localhost'; // Server Name
        $db_user = 'root'; // Username
        $db_pass = ''; // Password
        $db_name = 'chkex'; // Database Name
       
$conn=mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(!empty($_FILES["csv_file"]["name"]))
{
    // Allowed mime types
    $fileMimes = array(
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain'
    );
    // Validate whether selected file is a CSV file
    if (!empty($_FILES['csv_file']['name']) && in_array($_FILES['csv_file']['type'], $fileMimes))
    {
            // Open uploaded CSV file with read-only mode
            //echo "hi";
            $csvFile = fopen($_FILES['csv_file']['tmp_name'], 'r');
            // Skip the first line
            fgetcsv($csvFile);
            // Parse data from CSV file line by line
            while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
            {
                // Get row data
               $id=$getData[0];
                $name = $getData[1];
                $email = $getData[2];
                $contactno = $getData[3];
               // echo "hi";
               //echo $name;
                // If user already exists in the database with the same email
                $query = "SELECT id FROM chkdata WHERE email = '" . $getData[2] . "' AND flag='1'";
                $check = mysqli_query($conn, $query);
                if ($check->num_rows > 0)
                {
                   mysqli_query($conn, "UPDATE chkdata SET name = '" . $name . "', contactno = '" . $contactno . "', created_at = NOW() WHERE email = '" . $email . "'");
                   // echo "email already exists";
                }
                else
                {
                   // echo $email;
                     $data=mysqli_query($conn, "INSERT INTO chkdata (id,name,email,contactno,flag)
                     VALUES ('".$id."','".$name."', '".$email."', '".$contactno."','1')");
                }
            }
            // Close opened CSV file
            fclose($csvFile);
            echo "Success";
        
    }
    else
    {
        echo "Error1";
    }
}else{
  echo "Error2";  
}