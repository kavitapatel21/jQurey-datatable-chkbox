<!DOCTYPE html>
<html>
<head>
   <title>PHP - Jquery Datatables Example with checkbox</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </head>

<body>
<table id="my-example">
    <thead>
        <tr>
        <th>Id</th>
        <th>Fullname</th>
        <th>Email</th>
        <th>Contact No</th>
        <th>Check All <input type="checkbox" class='checkall' id='checkall'><input type="button" id='delete_record' value='Delete' ></th>
        </tr>
    </thead>
</table>
</body>
<script type="text/javascript">
 $(document).ready(function() {
    //display data
    var userDataTable=$('#my-example').DataTable({
       dataType    : 'json',
        "bProcessing": true,
        "sAjaxSource": "ajax.php",
        "aoColumns": [
              { mData: 'id' } ,
              { mData: 'name' },
              { mData: 'email' },
              { mData: 'contactno' },
              { mData: 'action' },
            ]
      });  

      // Check all 
   $('#checkall').click(function(){
      if($(this).is(':checked')){
         $('.delete_check').prop('checked', true);
      }else{
         $('.delete_check').prop('checked', false);
      }
   });

     // Delete record
     $('#delete_record').click(function(){

var deleteids_arr = [];
// Read all checked checkboxes
$("input:checkbox[class=delete_check]:checked").each(function () {
   deleteids_arr.push($(this).val());
});

// Check checkbox checked or not
if(deleteids_arr.length > 0){

   // Confirm alert
   var confirmdelete = confirm("Do you really want to Delete records?");
   if (confirmdelete == true) {
      $.ajax({
         url: 'delete.php',
         type: 'post',
         data: {deleteids_arr: deleteids_arr},
         success: function(response){
          userDataTable.ajax.reload();
         }
      });
   } 
}
});

  });
      </script>
</html>