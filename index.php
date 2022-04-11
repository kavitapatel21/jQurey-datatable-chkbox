<!DOCTYPE html>
<html>
<head>
   <title>PHP - Jquery Datatables Example with checkbox</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   
  
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
   
  
 
  </head>

<body>
<table id="my-example">
<div class="container">
   <form id="upload_csv" method="post" enctype="multipart/form-data">
   <tr>
     <label>Add More Data</label>&nbsp        
                <input type="file" name="csv_file" id="csv_file" accept=".csv" style="margin-top:5px;" />
                <input type="submit" name="upload" id="upload" value="Import" style="margin-top:10px;" class="btn btn-info" />&nbsp
                <button type="button" class="btn btn-info" id="export" style="margin-top:10px;">Export</button>&nbsp
                <a href="javascript:void(0)" id="dlbtn" style="display: none;">
    <button type="button" id="mine">Export</button>
</a>
</form>
<button class='btn btn-info insertUser' data-toggle='modal' data-target='#mupdateModal' style="margin-top:10px;" >Add</button>
                </tr>
               
                <div style="clear:both"></div>
  
</div>
    <thead>
        <tr>
		<th width="10%">
            <input type="checkbox" class='checkall' id='checkall'><input type="button" id='delete_record' value='Delete' >
        </th>
        <th>Id</th>
        <th>Fullname</th>
        <th>Email</th>
        <th>Contact No</th>
		<th>Action</th>
        </tr>
    </thead>
</table>
<div class='container'>

<!-- Modal -->
<div id="updateModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <form method="post" id="employeForm" name="employeForm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" >Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>            
                </div>
                <div class="form-group">
                    <label for="email" >Email</label>    
                    <input type="email" class="form-control" id="email" name="email"  placeholder="Enter email">  
                    <span></span>                        
                </div>      
              
                <div class="form-group">
                    <label for="contactno" >Contact No</label>    
                    <input type="text" class="form-control" id="contactno" name="contactno"  placeholder="Enter contactno">                          
                </div>
                
            </div>
            <div class="modal-footer">
                <input type="hidden" id="txt_userid" value="0">
                <button type="button" class="btn btn-success btn-sm" id="btn_save">Save</button>
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
</form>
    </div>
</div>

<!-- Modal -->
<div id="mupdateModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <form method="post" id="employeeForm" name="employeeForm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="mname" >Name</label>
                    <input type="text" class="form-control" id="mname" name="mname" placeholder="Enter name" required>            
                </div>
                <div class="form-group">
                    <label for="memail" >Email</label>    
                    <input type="email" class="form-control" id="memail" name="memail"  placeholder="Enter email"> 
                    <span><span>                         
                </div>      
              
                <div class="form-group">
                    <label for="mcontactno" >Contact No</label>    
                    <input type="text" class="form-control" id="mcontactno" name="mcontactno" placeholder="Enter contactno">                          
                </div>
                
            </div>
            <div class="modal-footer">
                <input type="hidden" id="mtxt_userid" value="0">
                <button type="button" class="btn btn-success btn-sm" id="mbtn_save">Save</button>
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
        </form>
    </div>
</div>
</body>
<script type="text/javascript">
 $(document).ready(function() {
    //display data
    var userDataTable=$('#my-example').DataTable({
       dataType    : 'json',
        "bProcessing": true,
        "sAjaxSource": "ajax.php",
        "aoColumns": [
			  { mData: 'action' },
              { mData: 'id' } ,
              { mData: 'name' },
              { mData: 'email' },
              { mData: 'contactno' },
			  { mData: 'trash' },    
            ],
            dom: 'lBfrtip',
   buttons: [
            'csv', 
             ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
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

	//Delete row
	$('#my-example').on('click','.deleteUser',function(){
 var id = $(this).data('id');
            var ele = $(this).parent().parent();  
            // AJAX request
            
            $.ajax({
              url: 'deleterow.php',
              type: 'post',
              data: {id: id}, 
              success: function() {
                ele.fadeOut().remove();	
                userDataTable.ajax.reload();
                
                        },
            });

});

//Update data
$('#my-example').on('click','.updateuser',function(){
      $('#updateModal').modal('show');  
      var id = $(this).data('id');

                $('#txt_userid').val(id);

                // AJAX request
                $.ajax({
                    url: 'update.php',
                    type: 'post',
                    data: {id: id},
                    dataType: 'json',
                    success: function(response){
                        if(response.status == 1){

                            $('#name').val(response.data.name);
                            $('#email').val(response.data.email);
                            $('#contactno').val(response.data.contactno);

                        }else{
                            alert("Invalid ID.");
                        }
                    }
                });    
    });
    $("#employeForm").validate({
        rules: {
            name: {
required: true
},
email: {
required: true,
email: true,
remote: {
            url: 'check-email.php',
            type: "post",
        }
},
contactno: {
required: true,
minlength: 10,
maxlength: 10,
number: true
},
},
messages: {
    name: 'Please enter Name.',
    email: {
          required: 'Please enter Email Address.',
          email: 'Please enter a valid Email Address.',
          remote: "email is already exist."
        },
        contactno: {
          required: 'Please enter Contact.',
          rangelength: 'Contact should be 10 digit number.'
        },
      },
});
 // Save user 
 $('#btn_save').click(function(){
    var form =  $("#employeForm");
    if (form.valid()) {
                var id = $('#txt_userid').val();

                var name = $('#name').val().trim();
                var email = $('#email').val().trim();
                var contactno = $('#contactno').val().trim();
                

                    // AJAX request
                    $.ajax({
                        url: 'updatedata.php',
                        type: 'post',
                        data: {id: id,name: name, email: email, contactno: contactno},
                        //dataType: 'json',
                        success: function(){
                           //alert('call');
                          // console.log(data)
                                // Empty the fields
                                $('#name','#email','#contactno').val('');
                                $('#txt_userid').val(0);
                                $('#updateModal').modal('hide');
                                  userDataTable.ajax.reload();   
                        }
                    });
                }
                
            });

      //Insert data
      $("#employeeForm").validate({
        rules: {
            mname: {
required: true
},
memail: {
required: true,
email: true,
remote: {
            url: 'mail.php',
            type: "post",
        }
},
mcontactno: {
required: true,
minlength: 10,
maxlength: 10,
number: true
},
},
messages: {
    mname: 'Please enter Name.',
    memail: {
          required: 'Please enter Email Address.',
          email: 'Please enter a valid Email Address.',
          remote: "email is already exist."
        },
        mcontactno: {
          required: 'Please enter Contact.',
          rangelength: 'Contact should be 10 digit number.'
        },
      },
});
    $("#mupdateModal").on('click','#mbtn_save', function(){
        var form =  $("#employeeForm");
    if (form.valid()) {
      var name = $('#mname').val().trim();
      var email = $('#memail').val().trim();
      var contactno = $('#mcontactno').val().trim();
            $.ajax({
              url: 'insert.php',
              type: 'post',
              data: {name: name, email: email, contactno: contactno}, 
              success: function(){
               $('#mname','#memail','#mcontactno').val('');
                                $('#mtxt_userid').val(0);
                                $('#mupdateModal').modal('hide');
                                  userDataTable.ajax.reload(); 
              }    
    });
}
  });

  //import CSV File
  $('#upload_csv').on('submit', function(event){
  event.preventDefault();
  $.ajax({  
                     url:"import.php",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                          if(data=='Error1')  
                          {  
                               alert("Invalid File");  
                          }  
                          else if(data == "Error2")  
                          {  
                               alert("Please Select File");  
                          }                           
                          else if(data == "Success")  
                          {  
                               alert("CSV file data has been imported");  
                               $('#upload_csv')[0].reset();
                               userDataTable.ajax.reload(); 

                          }  
                          else  
                          {  
                              $('#my-example').html(data);  
                          }  
                     }  
                })  
 });
     
 //Export CSV
 $("#export").click(function(){
	var csv = "csv";
	$.ajax({
		type: 'POST',
		url: 'exportdata.php',
		data: {csv:csv},
	    success: function(result) {
	      console.log(result);
	      setTimeout(function() {
				  var dlbtn = document.getElementById("dlbtn");
				  var file = new Blob([result], {type: 'text/csv'});
				  dlbtn.href = URL.createObjectURL(file);
				  dlbtn.download = 'myfile.csv';
				  $( "#mine").click();
				}, 2000);
	    }
	});
});

  });
  
      </script>
</html>