@if (Auth::check())
<?php
if(Auth::user()->id != 508){
      echo "You must be logged in as an admin to access this page";
      echo "<a href='login' >LogIn</a> ";
       return Redirect::to('login')->with('message', 'Login Failed');
       echo "You";

}?>
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                        </div>
                    @endif
 <?php 
$user_id =  Auth::user()->id ;
 ?> 

<br>

<table id="admin_table" class="table table-bordered" style="width:100%">
  <thead>
    <tr>
      <th>#</th>
      <th>User Name</th>
      <th>Club Name</th>
      <th>Status</th>
      <th style="width:150px" style="align:center">Action</th>
      <input type="hidden" name="club_enroll_id" id="club_enroll_id" class="form-control" />
    </tr>
  </thead>
</table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
@else
<a href="login">Login Here</a>
{!! dd(" YOU ARE NOT LOGGED IN ") !!}

@endif
<script type="text/javascript">
    
   $(document).ready(function() {
$('#admin_table').DataTable({
  "processing": true,
  "serverSide": true,
  "ajax": "{{ route('admin.admin_view') }}",
  "columns":[
    { "data": "id" },
    { "data": "name" },
    { "data": "club_name" },
    { "data": "status" },
    { "data": "action", orderable:false, searchable: false}
  ],
//  "order": [[1, 0]]
});

//script for the approve function
$(document).on('click', '.approve', function(e){
  var id = $(this).attr("id");
  

e.preventDefault();
  swal({
    title: "Are you sure?",
    text: "The User will join this Club!",
    icon: "warning",
    buttons: [
      'Deny!',
      'Yes, Approve User!'
    ],
    dangerMode: true,
  }).then(function(isConfirm) {
    if (isConfirm) {
      swal({
        title: 'Approved!',
        text: 'You have approved the user!',
        icon: 'success'
      }).then(function() {     
        $.ajax({
          url:"{{ route('admin_approve') }}",
          method:"get",
          data:{id:id},
          success:function(data)
          {
            //toastr.success('User Already Deleted', 'User Deleted')
            //  alert(data);
            $('#club_enroll_id').val(data.enroll_user_id);
            $('#admin_table').DataTable().ajax.reload();
          }
        })
      });
    } else {
      swal("Denied", "You have Denied User to Enroll from Club:)", "error");
    }
  });



});

//script for the deny function
$(document).on('click', '.deny', function(e){
  var id = $(this).attr("id");
      // var user_id ={{ Auth::user()->id}};
e.preventDefault();
  swal({
    title: "Are you sure?",
    text: "The User will have their request denied!",
    icon: "warning",
    buttons: [
      'Abort!',
      'Proceed, Deny Request!'
    ],
    dangerMode: true,
  }).then(function(isConfirm) {
    if (isConfirm) {
      swal({
        title: 'Denied!',
        text: 'You have denied the user!',
        icon: 'success'
      }).then(function() {     
        $.ajax({
          url:"{{ route('admin_deny') }}",
          method:"get",
          data:{id:id},
          success:function(data)
          {
            //toastr.success('User Already Deleted', 'User Deleted')
            //  alert(data);
            $('#club_enroll_id').val(data.enroll_user_id);
            $('#admin_table').DataTable().ajax.reload();
          }
        })
      });
    } else {
      swal("Aborted", "You have Aborted this operation:)", "error");
    }
  });
});

});
</script>