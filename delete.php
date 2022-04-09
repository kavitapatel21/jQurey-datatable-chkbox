<?php
        $host = "localhost"; /* Host name */
        $user = "root"; /* User */
        $password = ""; /* Password */
        $dbname = "chkex"; /* Database name */
        
        $conn = mysqli_connect($host, $user, $password,$dbname);
        $deleteids_arr = array();

   if(isset($_POST['deleteids_arr'])){
      $deleteids_arr = $_POST['deleteids_arr'];
   }
   foreach($deleteids_arr as $deleteid){
      mysqli_query($conn,"UPDATE chkdata SET flag=0 WHERE id =".$deleteid);
   }

?>