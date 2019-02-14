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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
</head>
<body>
 <div class="wrapper">
            <div class="container-fluid">
 <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">                        
                        <h4 class="page-title mdi mdi-account"> Admin Dashboard</h4>
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
<div class="row">

                    <div class="col-xl-3 col-md-6">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
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

                            <h4 class="header-title mt-0 m-b-30">Users</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1">
                                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                                           data-bgColor="#F9B9B9" value="72"
                                           data-skin="tron" data-angleOffset="180" data-readOnly=true
                                           data-thickness=".15"/>
                                </div>

                                <div class="widget-detail-1">
                                    <h2 class="p-t-10 mb-0"> {{$users}} </h2>
                                    <p class="text-muted m-b-10">Users</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
               

<div class="col-xl-3 col-md-6">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
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

                            <h4 class="header-title m-t-0 m-b-30">Clubs Enrollment</h4>

                            <p class="font-600 m-b-5"> Mara <span class="text-primary pull-right">80%</span></p>
                            <div class="progress progress-bar-primary-alt progress-sm m-b-20">
                                <div class="progress-bar progress-bar-primary progress-animated wow animated animated" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%; visibility: visible; animation-name: animationProgress;">
                                </div><!-- /.progress-bar .progress-bar-danger -->
                            </div><!-- /.progress .no-rounded -->
                            <p class="font-600 m-b-5">Mamba <span class="text-danger pull-right">65%</span></p>
                            <div class="progress progress-bar-danger-alt progress-sm m-b-20">
                                <div class="progress-bar progress-bar-danger progress-animated wow animated animated" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%; visibility: visible; animation-name: animationProgress;">
                                </div><!-- /.progress-bar .progress-bar-warning -->
                            </div><!-- /.progress .no-rounded -->
</div></div>


                    <div class="col-xl-3 col-md-6">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
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

                            <h4 class="header-title m-t-0 m-b-30"><i class="mdi mdi-notification-clear-all m-r-5"></i> Upcoming Reminders</h4>

                            <ul class="list-group m-b-0 user-list">
                                <li class="list-group-item">
                                    <a href="#" class="user-list-item">
                                        <div class="avatar">
                                            <i class="mdi mdi-circle text-primary"></i>
                                        </div>
                                        <div class="user-desc">
                                            <span class="name">Meet Manager</span>
                                            <span class="desc">February 29, 2019 - 10:30am to 12:45pm</span>
                                        </div>
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <a href="#" class="user-list-item">
                                        <div class="avatar">
                                            <i class="mdi mdi-circle text-success"></i>
                                        </div>
                                        <div class="user-desc">
                                            <span class="name">Project Discussion</span>
                                            <span class="desc">February 19, 2019 - 10:30am to 12:45pm</span>
                                        </div>
                                    </a>
                                </li>
                               
                            </ul>
                        </div>
                    </div>




                    <div class="col-xl-3 col-md-6">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
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
                            <h4 class="header-title mt-0 m-b-30">Club Intake</h4>

                            <div class="widget-box-2">
                                <div class="widget-detail-2">
                                    <span class="badge badge-pink badge-pill pull-left m-t-20">32% <i class="mdi mdi-trending-up"></i> </span>
                                    <h2 class="mb-0"> 158 </h2>
                                    <p class="text-muted m-b-25">Intake this week</p>
                                </div>
                                <div class="progress progress-bar-pink-alt progress-sm mb-0">
                                    <div class="progress-bar progress-bar-pink" role="progressbar"
                                         aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                         style="width: 77%;">
                                        <span class="sr-only">77% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->   

                    </div>
                    <div class="row">
                      
                        <div class="card-box">
<h4 class="header-title mt-0 m-b-30">Club Intake Chart</h4>
                    <canvas id="canvas" height="300" width="580"></canvas>
                                              
</div>
&nbsp
<div class="card-box">
<h4 class="header-title mt-0 m-b-30">Club Approvl Chart</h4>
                    <canvas id="canvas2" height="300" width="600"></canvas>

                    </div><!-- end col -->    
</div>

<div class="card-box">
     <h4 class="header-title mt-0 m-b-30">User Enrollment</h4>
<table id="admin_table" class="table table-hover    " style="width:100%">
  <thead>
    <tr>
      <th>#</th>
      <th>User Name</th>
      <th>Club Name</th>
      <th>Status</th>
      <th style="width:225px" style="align:center">Action</th>
      <input type="hidden" name="club_enroll_id" id="club_enroll_id" class="form-control" />
    </tr>
  </thead>
</table></div>
                
</div></div>
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
    { "data": "action", orderable:false, searchable: false},    
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
      swal("Denied", "You have Denied User to Enroll to Club:)", "error");
    }$('#admin_table').DataTable().ajax.reload();
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
            $('#admin_table').DataTable().ajax.reload();
          }
        })
      });
    } else {
      swal("Aborted", "You have Aborted this operation:)", "error");
    }$('#admin_table').DataTable().ajax.reload();
  });
});
});


</script>

<script>
    var club = ['Mara','Mamba','Maasai', 'Samburu', 'Olive', 'Razors', 'Warriors', 'Golag', 'Archipelo', 'Buffalo'];
    
    var data_viewer = <?php echo $viewer; ?>;


    var barChartData = {
        labels: club,
        datasets: [ {
            label: 'No. of members per club',
            backgroundColor: "rgba(151,187,205,0.5)",
            data: data_viewer
        }]
    };


    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: 'rgb(0, 255, 0)',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Club Membership'
                }
            }
        });




    var statuss = ['approved','pending','denied'];
    
    var data_viewers = <?php echo $data; ?>;


    var lineChartData = {
        labels: statuss,
        datasets: [ {
            label: 'enrollment per club',
            backgroundColor: [
                'rgba(255, 0, 0, 0.8)',
                'rgba(54, 162, 235, 0.2)',                
                'rgb(255, 214, 51)'
            ],
            data: data_viewers
        }]
    };


    
        var ctxs = document.getElementById("canvas2").getContext("2d");
        window.myBars = new Chart(ctxs, {
            type: 'pie',
            data: lineChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,                        
                       borderColor: [                
                'rgba(255, 159, 64, 1)'
            ],
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Club Enrollment'
                }
            }
        });


    };
</script>



