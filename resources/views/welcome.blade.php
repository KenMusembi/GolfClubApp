@if (Auth::check())
<?php
if(Auth::user()->id != 508){
      echo "You must be logged in as an admin to access this page";
      echo "<a href='login' >LogIn</a> ";
       return Redirect::to('login')->with('message', 'Login Failed');
       echo "You";
}?>
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
<body> <div class="wrapper">
            <div class="container-fluid">
 <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-20">
                            <button type="button" class="btn btn-custom dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>
                        <h4 class="page-title mdi mdi-account-multiple"> Admin Dashboard - Users</h4>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                        </div>
                    @endif
 <?php 
$user_id =  Auth::user()->id ;
 ?> 


<div class="card-box"> 
<table id="user_table" class="table table-hover" style="width:100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th style="width:320px" style="align:center">Action</th>
    </tr>
  </thead>
</table>


<!-- Modal of edit and add -->
<div id="userModal" class="modal" role="dialog"> 
<div class="modal-dialog">
  <div class="modal-content">    
    <form method="post" id="user_form">
      <div class="modal-header">
       
      <div class="card m-b-32"><h4>Update User Details</h4>
                               <img src="images/1026.jpg" class="card-img-top img-fluid"
                                      alt="profile-image">
                                </div>
                            
   
      </div>
      <div class="modal-body">
        {{csrf_field()}}
        <span id="form_output"></span>
        <div class="form-group">
          <label>Enter Name</label>
          <input type="text" name="name" id="name" class="form-control" />
        </div>
        <div class="form-group">
          <label>Enter Email</label>
          <input type="email" name="email" id="email" class="form-control" />
        </div>
        <div class="form-group">
          <label>Enter Password</label>
          <input type="password" name="password" id="password" class="form-control" />
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="user_id" id="user_id" value="" />
        <input type="hidden" name="button_action" id="button_action" value="insert" />
        <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </form>
  </div>
</div>
</div>

<!-- Modal of view -->
<div class="modal" id="view" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">

      <div class="card m-b-24"><h4>View Clubs</h4>
                               <img src="images/1026.jpg" class="card-img-top img-fluid"
                                      alt="profile-image">
                                </div>
                            
    </div> 
    <div class="modal-body">{{csrf_field()}}
      <p>No Clubs</p>
    </div>
    <div class="modal-footer">
      <button type="button" id="close_view" class="btn btn-primary close_view" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>

<!-- Modal of enroll -->
<div id="enroll" class="modal" role="dialog" aria-hidden="true" tabindex="-1">
<div class="modal-dialog" role="document">
  <div class="modal-content">
   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hiden="true"></button>
        <h3 class="modal-title mt-0 " align="center">Enroll To Club</h3><br>   

      </div>
      <div class="modal-body">
        {{csrf_field()}}
        <span id="form_output"></span>
        <div class="form-group">
          <p>Once you click a checkbox, the user will be enrolled to that Club.</p>
          <input type="hidden" name="enroll_user_id" id="enroll_user_id" class="form-control" />
          <input type="hidden" name="enroll_club_id" id="enroll_club_id" class="form-control" />
        </div>
        <br>
<div class=" checkbox checkbox-success">
        <input type="checkbox" class="Mara " id="Mara">
        <label class="custom-control-label" for="Mara">Mara</label><br>

        <input type="checkbox" class="Maasai "  id="Maasai">
        <label class="custom-control-label" for="Maasai">Maasai</label><br>

        <input type="checkbox" name="feature3" class="Mamba "  id="Mamba" value="Mamba">
         <label class="custom-control-label" for="Mamba">Mamba</label><br>

        <input type="checkbox" name="feature4" class="Samburu "  id="Samburu" value="Samburu">
         <label class="custom-control-label" for="Samburu">Samburu</label><br>
      
        <input type="checkbox" name="feature5" class="Olive "  id="Olive" value="Olive">
         <label class="custom-control-label" for="Olive">Olive</label><br>

        <input type="checkbox" name="feature6" class="Razors "  id="Razors" value="Razors">
         <label class="custom-control-label" for="Razors">Razors</label><br>

        <input type="checkbox" name="feature7" class="Warriors "  id="Warriors" value="Warriors">
        <label class="custom-control-label" for="Warriors">Warriors</label><br>

        <input type="checkbox" name="feature8" class="Golag "  id="Golag" value="Golag">
         <label class="custom-control-label" for="Golag">Golag</label><br>

        <input type="checkbox" name="feature9" class="Archipelo "  id="Archipelo" value="Archipelo">
         <label class="custom-control-label" for="Archipelo">Archipelo</label><br>
      
        <input type="checkbox" name="feature10" class="Buffalo "  id="Buffalo" value="Buffalo">
         <label class="custom-control-label" for="Buffalo">Buffalo</label><br>
      </div></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="close_button" data-dismiss="modal">Close</button>
      </div>
    </form>
  </div>
</div>
</div></div></div>
@else
<a href="login">Login Here</a>
{!! dd(" YOU ARE NOT LOGGED IN ") !!}

@endif

</div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function() {
$('#user_table').DataTable({
  "processing": true,
  "serverSide": true,
  "ajax": "{{ route('welcome.getdata') }}",
  "columns":[
    { "data": "id" },
    { "data": "name" },
    { "data": "email" },
    { "data": "action", orderable:false, searchable: false}
  ],
//  "order": [[1, 0]]
});
$('#add_data').click(function(){
  $('#userModal').modal('show');
  $('#user_form')[0].reset();
  $('#form_output').html('');
  $('#button_action').val('insert');
  $('#action').val('Add');
});
$('#user_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
    url:"{{ route('welcome.postdata') }}",
    method:"POST",
    data:form_data,
    dataType:"json",
    success:function(data)
    {
      if(data.error.length > 0)
      {
        var error_html = '';
        for(var count = 0; count < data.error.length; count++)
        {
          error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
        }
        $('#form_output').html(error_html);
      }
      else
      {
        toastr.success('User Data Edited', 'User Edit Succesfull')
        $('#form_output').html(data.success);
        $('#user_form')[0].reset();
        $('#action').val('Add');
        $('.modal-title').text('Add Data');
        $('#button_action').val('insert');
        $('#user_table').DataTable().ajax.reload();
      }
    }
  })
});
$(document).on('click', '.edit', function(){
  var id = $(this).attr("id");
  $('#form_output').html('');
  $.ajax({
    url:"{{route('welcome.fetchdata')}}",
    method:'get',
    data:{id:id},
    dataType:'json',
    success:function(data)
    {
      $('#name').val(data.name);
      $('#email').val(data.email);
      $('#user_id').val(id);
      $('#userModal').modal('show');
      $('#action').val('Update');
      $('.modal-title').text('Update Data');
      $('#button_action').val('update');
    }
  })
});
$(document).on('click', '.delete', function(e){
  var id = $(this).attr('id');
  var form = this;
  e.preventDefault();
  swal({
    title: "Are you sure?",
    text: "You will not be able to recover this imaginary file!",
    icon: "warning",
    buttons: [
      'No, cancel it!',
      'Yes, I am sure!'
    ],
    dangerMode: true,
  }).then(function(isConfirm) {
    if (isConfirm) {
      swal({
        title: 'Deleted!',
        text: 'User is successfully deleted!',
        icon: 'success'
      }).then(function() {
        //
        $.ajax({
          url:"{{route('welcome.removedata')}}",
          method:"get",
          data:{id:id},
          success:function(data)
          {
            //toastr.success('User Already Deleted', 'User Deleted')
            //  alert(data);
            $('#user_table').DataTable().ajax.reload();
          }
        })
      });
    } else {
      swal("Cancelled", "The user has not been deleted :)", "error");
    }
  });
});
$(document).on('click', '.view', function(){
  var id = $(this).attr("id");
  var club_name = $('#club_name').val();
  $.ajax({
    url:"{{route('welcome.viewclubs')}}",
    method:'get',
    data:{id:id},
    dataType:'json',
    success:function(data)
    {
      $('#user_name').val(data.user_name);
      $('#club_name').val(data.club_name);
      $('#action').val("view");
      //$('#view').modal('show');
      $('#view').on('hidden.bs.modal', function (e) {
        //location.reload();
      });
      $('#view').modal('show');
      $('.modal-title').text('View Clubs');
      $('#button_action').val('view');
      //alert(data.data[0].clubs);
      if(data.data[0].clubs.length == 0){
        alert('empty');
        $("#view").find('.modal-body').text('No Clubs');
      } else {
        $("#view").find('.modal-body').text(data.data[0].clubs);
      }
      //$(".modal-body").text(data.data[0].clubs);
    }})});

    $(document).on('click', '.close_view', function(){
      $('#view').on('hidden.bs.modal', function (e) {
        //location.reload();
        $("#view").find('.modal-body').empty();
        $(this).removeData('bs.modal');
        $("#view").find('.modal-body').text('No Clubs');
      });
    });

    $('#user_table').on( 'open.dt', function () {
      toastr.info('Users are being Processsed', 'Please Wait')
    } );
    //addint script for enroll
    $(document).on('click', '.enroll', function(){
      $('input:checkbox').removeAttr('checked');
      $('input:checkbox').prop('checked', false);
      var id = $(this).attr("id");
      // $('#form_output').html('');
      $.ajax({
        url:"{{route('welcome.enrollData')}}",
        method:'get',
        data:{id:id},
        dataType:'json',
        success:function(data)
        {
          $('#enroll_user_id').val(data.enroll_user_id);
          $('#enroll_club_id').val(data.enroll_club_id);
          //     $('#user_id').val(id);
          $('#enroll').modal('show');
          $('#action').val('Enroll');
          $('.modal-title').text('Enroll User');
          $('#user_table').DataTable().ajax.reload();
          //console.log(data.enroll_club_id);
          if(data.enroll_club_id.includes(1)===true){
            $('.Mara').prop('checked', true);
          }
          if (data.enroll_club_id.includes(2)===true){
            $('.Maasai').prop('checked', true);
          }
          if(data.enroll_club_id.includes(3)===true){
            $('.Mamba').prop('checked', true);
          }
          if(data.enroll_club_id.includes(4)===true){
            $('.Samburu').prop('checked', true);
          }
          if(data.enroll_club_id.includes(5)===true){
            $('.Olive').prop('checked', true);
          }
          if(data.enroll_club_id.includes(6)===true){
            $('.Razors').prop('checked', true);
          }
          if(data.enroll_club_id.includes(7)===true){
            $('.Warriors').prop('checked', true);
          }
          if(data.enroll_club_id.includes(8)===true){
            $('.Golag').prop('checked', true);
          }
          if(data.enroll_club_id.includes(9)===true){
            $('.Archipelo').prop('checked', true);
          }
          if (data.enroll_club_id.includes(10)===true){
            $('.Buffalo').prop('checked', true);
          }
          $('#modal').on('hidden', function() {
            $(this).data('modal').$element.removeData();
          })

          //add method for taking in the club
        }
      })  });
      $(document).on('click', '.Mara', function(e){
        var id = $(this).attr("id");
        var userId = $('#enroll_user_id').val();
        e.preventDefault();
swal({
 title: "Are you sure?",
 text: "Please Confirm!",
 icon: "warning",
 buttons: [
   'No, cancel it!',
   'Yes, I am sure!'
 ],
 dangerMode: true,
}).then(function(isConfirm) {
 if (isConfirm) {
   swal({
     title: 'Succesfull!',
     text: 'Action successfully completed!',
     icon: 'success'
   }).then(function() {
     //
        $.ajax({
          url:'{{ url('enroll-user') }}/'+userId,
          method:'get',
          data:{id:id},
          dataType:'json',
          success:function(data){
            $('#enroll').modal('show');
            $('#action').val('Mara');
            $('#Mara').val('Mara');
            $('#enroll').modal('hide');
          }})});
        } else {
          swal("Cancelled", "The user has not been enrolled :)", "error");
        }
      });$('#enroll').modal('hide');
});

$(document).on('click', '.Maasai', function(e){
  var id = $(this).attr("id");
  var userId = $('#enroll_user_id').val();
  e.preventDefault();
swal({
title: "Are you sure?",
text: "Please Confirm!",
icon: "warning",
buttons: [
'No, cancel it!',
'Yes, I am sure!'
],
dangerMode: true,
}).then(function(isConfirm) {
if (isConfirm) {
swal({
title: 'Succesfull!',
text: 'Action successfully completed!',
icon: 'success'
}).then(function() {
//
  $.ajax({
    url:'{{ url('enroll-user') }}/'+userId,
    method:'get',
    data:{id:id},
    dataType:'json',
    success:function(data){
      $('#enroll').modal('show');
      $('#action').val('Maasai');
      $('#Maasai').val('Maasai');
    }})});
  } else {
    swal("Cancelled", "The user has not been enrolled :)", "error");
  }
});$('#enroll').modal('hide');
});
$(document).on('click', '.Mamba', function(e){
  var id = $(this).attr("id");
  var userId = $('#enroll_user_id').val();
  e.preventDefault();
swal({
title: "Are you sure?",
text: "Please Confirm!",
icon: "warning",
buttons: [
'No, cancel it!',
'Yes, I am sure!'
],
dangerMode: true,
}).then(function(isConfirm) {
if (isConfirm) {
swal({
title: 'Succesfull!',
text: 'Action successfully completed!',
icon: 'success'
}).then(function() {
//
  $.ajax({
    url:'{{ url('enroll-user') }}/'+userId,
    method:'get',
    data:{id:id},
    dataType:'json',
    success:function(data){
      $('#enroll').modal('show');
      $('#action').val('Mamba');
      $('#Mamba').val('Mamba');
    }})});
  } else {
    swal("Cancelled", "The user has not been enrolled :)", "error");
  }
});$('#enroll').modal('hide');
});
$(document).on('click', '.Samburu', function(e){
  var id = $(this).attr("id");
  var userId = $('#enroll_user_id').val();
  e.preventDefault();
swal({
title: "Are you sure?",
text: "Please Confirm!",
icon: "warning",
buttons: [
'No, cancel it!',
'Yes, I am sure!'
],
dangerMode: true,
}).then(function(isConfirm) {
if (isConfirm) {
swal({
title: 'Succesfull!',
text: 'Action successfully completed!',
icon: 'success'
}).then(function() {
//
  $.ajax({
    url:'{{ url('enroll-user') }}/'+userId,
    method:'get',
    data:{id:id},
    dataType:'json',
    success:function(data){
      $('#enroll').modal('show');
      $('#action').val('Samburu');
      $('#Samburu').val('Samburu');
    }})});
  } else {
    swal("Cancelled", "The user has not been enrolled :)", "error");
  }
});$('#enroll').modal('hide');
});
$(document).on('click', '.Olive', function(e){
  var id = $(this).attr("id");
  var userId = $('#enroll_user_id').val();
  e.preventDefault();
swal({
title: "Are you sure?",
text: "Please Confirm!",
icon: "warning",
buttons: [
'No, cancel it!',
'Yes, I am sure!'
],
dangerMode: true,
}).then(function(isConfirm) {
if (isConfirm) {
swal({
title: 'Succesfull!',
text: 'Action successfully completed!',
icon: 'success'
}).then(function() {
//
  $.ajax({
    url:'{{ url('enroll-user') }}/'+userId,
    method:'get',
    data:{id:id},
    dataType:'json',
    success:function(data){
      $('#enroll').modal('show');
      $('#action').val('Olive');
      $('#Olive').val('Olive');
    }})});
  } else {
    swal("Cancelled", "The user has not been enrolled :)", "error");
  }
});$('#enroll').modal('hide');
});
$(document).on('click', '.Razors', function(e){
  var id = $(this).attr("id");
  var userId = $('#enroll_user_id').val();
  e.preventDefault();
swal({
title: "Are you sure?",
text: "Please Confirm!",
icon: "warning",
buttons: [
'No, cancel it!',
'Yes, I am sure!'
],
dangerMode: true,
}).then(function(isConfirm) {
if (isConfirm) {
swal({
title: 'Succesfull!',
text: 'Action successfully completed!',
icon: 'success'
}).then(function() {
//
  $.ajax({
    url:'{{ url('enroll-user') }}/'+userId,
    method:'get',
    data:{id:id},
    dataType:'json',
    success:function(data){
      $('#enroll').modal('show');
      $('#action').val('Razors');
      $('#Razors').val('Razors');
    }})});
  } else {
    swal("Cancelled", "The user has not been enrolled :)", "error");
  }
});$('#enroll').modal('hide');
});
$(document).on('click', '.Warriors', function(e){
  var id = $(this).attr("id");
  var userId = $('#enroll_user_id').val();
  e.preventDefault();
swal({
title: "Are you sure?",
text: "Please Confirm!",
icon: "warning",
buttons: [
'No, cancel it!',
'Yes, I am sure!'
],
dangerMode: true,
}).then(function(isConfirm) {
if (isConfirm) {
swal({
title: 'Succesfull!',
text: 'Action successfully completed!',
icon: 'success'
}).then(function() {
//
  $.ajax({
    url:'{{ url('enroll-user') }}/'+userId,
    method:'get',
    data:{id:id},
    dataType:'json',
    success:function(data){
      $('#enroll').modal('show');
      $('#action').val('Warriors');
      $('#Warriors').val('Warriors');
    }})});
  } else {
    swal("Cancelled", "The user has not been enrolled :)", "error");
  }
});$('#enroll').modal('hide');
});
$(document).on('click', '.Golag', function(e){
  var id = $(this).attr("id");
  var userId = $('#enroll_user_id').val();
  e.preventDefault();
swal({
title: "Are you sure?",
text: "Please Confirm!",
icon: "warning",
buttons: [
'No, cancel it!',
'Yes, I am sure!'
],
dangerMode: true,
}).then(function(isConfirm) {
if (isConfirm) {
swal({
title: 'Succesfull!',
text: 'Action successfully completed!',
icon: 'success'
}).then(function() {
//
  $.ajax({
    url:'{{ url('enroll-user') }}/'+userId,
    method:'get',
    data:{id:id},
    dataType:'json',
    success:function(data){
      $('#enroll').modal('show');
      $('#action').val('Golag');
      $('#Golag').val('Golag');
    }})});
  } else {
    swal("Cancelled", "The user has not been enrolled :)", "error");
  }
});$('#enroll').modal('hide');
});
$(document).on('click', '.Archipelo', function(e){
  var id = $(this).attr("id");
  var userId = $('#enroll_user_id').val();
  e.preventDefault();
swal({
title: "Are you sure?",
text: "Please Confirm!",
icon: "warning",
buttons: [
'No, cancel it!',
'Yes, I am sure!'
],
dangerMode: true,
}).then(function(isConfirm) {
if (isConfirm) {
swal({
title: 'Succesfull!',
text: 'Action successfully completed!',
icon: 'success'
}).then(function() {
//
  $.ajax({
    url:'{{ url('enroll-user') }}/'+userId,
    method:'get',
    data:{id:id},
    dataType:'json',
    success:function(data){
      $('#enroll').modal('show');
      $('#action').val('Archipelo');
      $('#Archipelo').val('Archipelo');
    }})});
  } else {
    swal("Cancelled", "The user has not been enrolled :)", "error");
  }
});$('#enroll').modal('hide');
});
$(document).on('click', '.Buffalo', function(e){
  var id = $(this).attr("id");
  var userId = $('#enroll_user_id').val();
  e.preventDefault();
swal({
title: "Are you sure?",
text: "Please Confirm!",
icon: "warning",
buttons: [
'No, cancel it!',
'Yes, I am sure!'
],
dangerMode: true,
}).then(function(isConfirm) {
if (isConfirm) {
swal({
title: 'Succesfull!',
text: 'Action successfully completed!',
icon: 'success'
}).then(function() {
//
  $.ajax({
    url:'{{ url('enroll-user') }}/'+userId,
    method:'get',
    data:{id:id},
    dataType:'json',
    success:function(data){
      $('#enroll').modal('show');
      $('#action').val('Buffalo');
      $('#Buffalo').val('Buffalo');
    }})});
  } else {
    swal("Cancelled", "The user has not been enrolled :)", "error");
  }
});$('#enroll').modal('hide');
});
                });
                </script>
              </body>
              </html>
