<?php
        $host = "localhost"; /* Host name */
        $user = "root"; /* User */
        $password = ""; /* Password */
        $dbname = "chkex"; /* Database name */
        
        $conn = mysqli_connect($host, $user, $password,$dbname);


        $sql = "SELECT * FROM chkdata WHERE flag=1 order by id asc";
      
        $result = mysqli_query($conn, $sql);

        $data = array();
        while($row = mysqli_fetch_assoc($result)) {
          //Update Button
        $updateButton = "<button class='btn btn-sm btn-primary updateuser' data-id='".$row['id']."'>Update</button>";
        // Insert Button
      $insertButton = "<button class='btn btn-sm btn-info insertUser' data-id='".$row['id']."' data-toggle='modal' data-target='#mupdateModal' >Add</button>";
        //Checkbox
        $chkbox = "<input type='checkbox' class='delete_check' id='delcheck_".$row['id']."' value='".$row['id']."'>";
     $action =$chkbox;
	 $trash="<button class='btn btn-sm btn-danger deleteUser' data-id='".$row['id']."'>Delete</button>";
	 $btn=$trash."  ".$updateButton."  ".$insertButton;
     $data[] = array(
       "id" => $row['id'],
       "name" => $row['name'],
       "email" => $row['email'],
       "contactno" => $row['contactno'],
       "action" => $action,
	   "trash" => $btn,
	
     );
   }
$results = ["sEcho" => 1,
        	"iTotalRecords" => count($data),
        	"iTotalDisplayRecords" => count($data),
        	"aaData" => $data ];
echo json_encode($results);
?>