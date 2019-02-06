@if (Auth::check())
@extends('layouts.master')
<!DOCTYPE html>
<html>
<head>
<title>Golf Club App </title>
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.0/css/buttons.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.4/css/select.bootstrap.min.css">

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.4/js/dataTables.select.min.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
</head>
<body>
                  <br><br><br><br><br><br><br>
          <div class="container"><br>
             <?php $user_id =  Auth::user()->id ; ?></h4>
            <h4 align="center">Golf Club App - {{Auth::user()->name}} Dashboard</h4>

            <div align="right">
              <button type="button" name="MyClubs" id="myclubs" class="btn btn-success btn-sm myclubs">MyClubs</button>              
            </div>
            <br />
            <table id="clubs_table" class="table table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Club</th>
                  <th>Desription</th>
                  <th style="width:" style="align:center">Action</th>
                </tr>
              </thead>
            </table>
<hr><br><br><hr>
<h3>Club History</h3>
<table id="history_table" class="table table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>Club Name</th>
                  <th>Created At</th>
                  <th>Updated At</th>                  
                  <th>Status</th>
                </tr>
              </thead>
            </table>

          </div>
                
<!-- Modal of MyClubs -->
<div class="modal" id="myclubs_Modal" tabindex="-1" role="dialog" aria-labelledby="myclubs_ModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="myclubs_ModalLabel">View Clubs</h5>
      <button type="button" class="close" id="myclubs_Modalclose" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">{{csrf_field()}}
      <p>You are Not in Any Club</p>
      <!-- add enroll button here -->
    </div>
    <div class="modal-footer">
      <button type="button" id="myclubs_Modalclose" class="btn btn-primary close_view" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>

<br><br><br><br><br>
@else
<a href="login">Login Here</a>
{!! dd(" YOU ARE NOT LOGGED IN ") !!}

@endif
<script>
    // toastr.success("Table Data Loaded Succesfully", "Success!");
     $(document).ready(function() {
     $('#clubs_table').DataTable( {
         "processing": true,
         "serverSide": true,
         "ajax": "{{ route('clubs.getdata') }}",
         "columns":[
           { "data": "id" },
           { "data": "club_name" },
           { "data": "description" },
           { "data": "action", orderable:false, searchable: false}
         ],
       //  "order": [[1, 0]]
       });
     
$(document).on('click', '.enroll', function(e){
  var id = $(this).attr("id");
       var user_id ={{ Auth::user()->id}};
e.preventDefault();
  swal({
    title: "Are you sure?",
    text: "You will be enrolled to this club!",
    icon: "warning",
    buttons: [
      'No, cancel it!',
      'Yes, Enroll Me!'
    ],
    dangerMode: true,
  }).then(function(isConfirm) {
    if (isConfirm) {
      swal({
        title: 'Pending!',
        text: 'Admin will confirm your enrollment!',
        icon: 'success'
      }).then(function() {     
        $.ajax({
          url:'{{ url('admin_enroll') }}/'+user_id,
          method:"get",
          data:{id:id},
          success:function(data)
          {
            //toastr.success('User Already Deleted', 'User Deleted')
            //  alert(data);
            $('#clubs_table').DataTable().ajax.reload();
          }
        })
      });
    } else {
      swal("You will be Removed", "If you had been enrolled, you will be removed:)", "error");
    }
  });
});
     //sript for displaying clubs user is enrolled in
     $(document).on('click', '.myclubs', function(){
       var id = $(this).attr("id");
       var user_id ={{ Auth::user()->id}};
       $.ajax({
         url:'{{ url('myclubs') }}/'+user_id,//this or $user_id
         method:'get',
         data:{id:id},
         dataType:'json',
         success:function(data)
         {
           $('#user_id').val(data.user_id);
           $('#club_id').val(data.club_id);
           $('#action').val("myclubs");
           //$('#view').modal('show');
           $('#myclubs_Modal').on('hidden.bs.modal', function (e) {
             //location.reload();
           });
           $('#myclubs_Modal').modal('show');
           $('.modal-title').text('Clubs Enrolled In');
           $('#button_action').val('myclubs');
           //alert(data.data[0].clubs);
           if(data.data[0].clubs.length == 0){
             alert('empty');
             $("#myclubs_Modal").find('.modal-body').text('No Clubs');
           } else {
             $("#myclubs_Modal").find('.modal-body').text(data.data[0].clubs);
           }
           //$(".modal-body").text(data.data[0].clubs);
         }
       }) 
    // });
         //refresh my clubs modal on click
         $(document).on('click', '.myclubs_Modalclose', function(){
           $('#myclubs_Modal').on('hidden.bs.modal', function (e) {
             //location.reload();
             $("#myclubs_Modal").find('.modal-body').empty();
             $(this).removeData('bs.modal');
             $("#myclubs_Modal").find('.modal-body').text('You are Not Enrolled in any club');
           });
         });
                });

      });
</script>
<script>

$(document).ready(function() {  
     $('#history_table').DataTable( {
         "processing": true,
         "responsive": true,  
         "serverSide": true,
         "ajax": "{{ route('clubhistory') }}",                  
         "columns":[
           { "data": "club_name" },
           { "data": "created_at" },
           { "data": "updated_at" },
           { "data": "status"}
         ],
       //  "order": [[1, 0]]
       });     

   });
  </script>