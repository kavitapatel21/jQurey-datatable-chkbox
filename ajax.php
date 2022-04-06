<?php
        $host = "localhost"; /* Host name */
        $user = "root"; /* User */
        $password = ""; /* Password */
        $dbname = "chkex"; /* Database name */
        
        $conn = mysqli_connect($host, $user, $password,$dbname);


        $sql = "SELECT id, name, email, contactno FROM chkdata";
      
        $result = mysqli_query($conn, $sql);

        $data = array();
        while($row = mysqli_fetch_assoc($result)) {
        //Checkbox
        $chkbox = "<input type='checkbox' class='delete_check' id='delcheck_".$row['id']."' onclick='checkcheckbox();' value='".$row['id']."'>";
     $action =$chkbox;
     $data[] = array(
       "id" => $row['id'],
       "name" => $row['name'],
       "email" => $row['email'],
       "contactno" => $row['contactno'],
       "action" => $action
     );
   }
$results = ["sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
        	"aaData" => $data ];
echo json_encode($results);
?>