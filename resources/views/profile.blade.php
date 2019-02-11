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

        <div class="wrapper">
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
                        <h4 class="page-title">Profile</h4>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                    <div class="col-sm-8">
                        <div class="bg-picture card-box">
                            <div class="profile-info-name">
                                <img src="images/profile.jpg"
                                     class="img-thumbnail" alt="profile-image">

                                <div class="profile-info-detail">
                                    <h4 class="m-0">{{Auth::user()->name}}</h4>
                                    <p class="text-muted m-b-20"><i>Web Designer</i></p>
                                    <p>Hi I'm {{Auth::user()->name}},has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC,making it over 2000 years old.Contrary to popular belief, Lorem Ipsum is not simplyrandom text. It has roots in a piece of classical Latin literature from 45 BC.</p>

                                    <div class="button-list m-t-20">
                                        <button type="button" class="btn btn-facebook btn-sm waves-effect waves-light">
                                            <i class="fa fa-facebook"></i>
                                        </button>

                                        <button type="button" class="btn btn-sm btn-twitter waves-effect waves-light">
                                            <i class="fa fa-twitter"></i>
                                        </button>

                                        <button type="button" class="btn btn-sm btn-linkedin waves-effect waves-light">
                                            <i class="fa fa-linkedin"></i>
                                        </button>

                                        <button type="button" class="btn btn-sm btn-dribbble waves-effect waves-light">
                                            <i class="fa fa-dribbble"></i>
                                        </button>

                                    </div>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!--/ meta -->



                        <form method="post" class="card-box">
                                    <span class="input-icon icon-right">
                                        <textarea rows="2" class="form-control" placeholder="Post a new message"></textarea>
                                    </span>
                            <div class="p-t-10 pull-right">
                                <a class="btn btn-sm btn-primary waves-effect waves-light">Send</a>
                            </div>
                            <ul class="nav nav-pills profile-pills m-t-10">
                                <li>
                                    <a href="#"><i class="fa fa-user"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-location-arrow"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class=" fa fa-camera"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-smile-o"></i></a>
                                </li>
                            </ul>

                        </form>
                        


                    </div>

                    <div class="col-sm-4">
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

                            <h4 class="header-title m-t-0 m-b-30">My Team Members</h4>

                            <ul class="list-group m-b-0 user-list">
                                <li class="list-group-item">
                                    <a href="#" class="user-list-item">
                                        <div class="avatar">
                                            <img src="images/users/avatar-2.jpg" alt="">
                                        </div>
                                        <div class="user-desc">
                                            <span class="name">Maya Angelou</span>
                                            <span class="desc">CEO</span>
                                        </div>
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <a href="#" class="user-list-item">
                                        <div class="avatar">
                                            <img src="images/users/avatar-3.jpg" alt="">
                                        </div>
                                        <div class="user-desc">
                                            <span class="name">James Neon</span>
                                            <span class="desc">Web Designer</span>
                                        </div>
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <a href="#" class="user-list-item">
                                        <div class="avatar">
                                            <img src="images/users/avatar-5.jpg" alt="">
                                        </div>
                                        <div class="user-desc">
                                            <span class="name">John Smith</span>
                                            <span class="desc m-b-0">Web Developer</span>
                                        </div>
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <a href="#" class="user-list-item">
                                        <div class="avatar">
                                            <img src="images/users/avatar-6.jpg" alt="">
                                        </div>
                                        <div class="user-desc">
                                            <span class="name">Michael Zenaty</span>
                                            <span class="desc">Programmer</span>
                                        </div>
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <a href="#" class="user-list-item">
                                        <div class="avatar">
                                            <img src="images/users/avatar-1.jpg" alt="">
                                        </div>
                                        <div class="user-desc">
                                            <span class="name">Mat Helme</span>
                                            <span class="desc">Manager</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>


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
                                            <span class="desc">February 29, 2016 - 10:30am to 12:45pm</span>
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
                                            <span class="desc">February 29, 2016 - 10:30am to 12:45pm</span>
                                        </div>
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <a href="#" class="user-list-item">
                                        <div class="avatar">
                                            <i class="mdi mdi-circle text-pink"></i>
                                        </div>
                                        <div class="user-desc">
                                            <span class="name">Meet Manager</span>
                                            <span class="desc">February 29, 2016 - 10:30am to 12:45pm</span>
                                        </div>
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <a href="#" class="user-list-item">
                                        <div class="avatar">
                                            <i class="mdi mdi-circle text-muted"></i>
                                        </div>
                                        <div class="user-desc">
                                            <span class="name">Project Discussion</span>
                                            <span class="desc">February 29, 2016 - 10:30am to 12:45pm</span>
                                        </div>
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <a href="#" class="user-list-item">
                                        <div class="avatar">
                                            <i class="mdi mdi-circle text-danger"></i>
                                        </div>
                                        <div class="user-desc">
                                            <span class="name">Meet Manager</span>
                                            <span class="desc">February 29, 2016 - 10:30am to 12:45pm</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>


            </div> <!-- end container -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <a href="javascript:void(0);" class="right-bar-toggle">
                    <i class="mdi mdi-close-circle-outline"></i>
                </a>
                <h4 class="">Notifications</h4>
                <div class="notification-list nicescroll">
                    <ul class="list-group list-no-border user-list">
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="images/users/avatar-2.jpg" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">Zendaya Orit</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-info">
                                    <i class="mdi mdi-account"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Signup</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">5 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-pink">
                                    <i class="mdi mdi-comment"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Message received</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="images/users/avatar-3.jpg" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">James Anderson</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 days ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-warning">
                                    <i class="mdi mdi-settings"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">Settings</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- /Right-bar -->

        </div>
        <!-- end wrapper -->


        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        2019 © GOLFCLUB. 
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->
    </li>  

        <!-- jQuery  -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="js/jquery.core.js"></script>
        <script src="js/jquery.app.js"></script>

    </body>

@else
<a href="login">Login Here</a>
{!! dd(" YOU ARE NOT LOGGED IN ") !!}

@endif

</html>