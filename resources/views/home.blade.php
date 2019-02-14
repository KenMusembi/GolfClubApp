@extends('layouts.app')
<style>
html, body {
  margin: 0; padding: 0;
}
.hero-bkg-animated {
  background: white url(images/clouds.jpg) repeat 0 0;
  width: 100%;
  margin: 0;
  text-align: center;
 height: 400px;
 position: relative;
  padding-top: 120px;
  box-sizing: border-box;
  -webkit-animation: slide 20s linear infinite;
}

.hero-bkg-animated h1 {
  font-family: sans-serif;
  height: 100%;
}

@-webkit-keyframes slide {
    from { background-position: 0 0; }
    to { background-position: -500px 0; }
}
</style>
                    
  <div class="wrapper">    
    <div class="card m-b-20">
                              <div class="hero-bkg-animated">
  <h2 class="page-title">Golf CLub App</h2>
</div>
                                
                            </div>
    
            <div class="container-fluid">
                
                    <div class="col-xl-8 offset-xl-2">
                        <div class="row">

                            <!--Pricing Column-->
                            <article class="pricing-column col-lg-4 col-md-4">
                                <div class="inner-box card-box">
                                    <div class="plan-header text-center">
                                        <h3 class="plan-title">1st League</h3>
                                        <h2 class="plan-price">$19</h2>
                                        <div class="plan-duration">Per Session</div>
                                    </div>
                                    <ul class="plan-stats list-unstyled text-center">
                                        <li>5 Golf Courses</li>
                                        <li>Club Storage</li>
                                        <li>No Tax</li>
                                        <li>1 User</li>
                                        <li>24x7 Support</li>
                                    </ul>

                                    <div class="text-center">
                                        <a href="#" class="btn btn-success btn-bordred btn-rounded waves-effect waves-light">Signup Now</a>
                                    </div>
                                </div>
                            </article>


                            <!--Pricing Column-->
                            <article class="pricing-column col-lg-4 col-md-4">
                                <div class="ribbon"><span>POPULAR</span></div>
                                <div class="inner-box card-box">
                                    <div class="plan-header text-center">
                                        <h3 class="plan-title">Premium</h3>
                                        <h2 class="plan-price">$29</h2>
                                        <div class="plan-duration">Per Month</div>
                                    </div>
                                    <ul class="plan-stats list-unstyled text-center">
                                        <li>5 Projects</li>
                                        <li>1 GB Storage</li>
                                        <li>No Domain</li>
                                        <li>1 User</li>
                                        <li>24x7 Support</li>
                                    </ul>

                                    <div class="text-center">
                                        <a href="#" class="btn btn-success btn-bordred btn-rounded waves-effect waves-light">Signup Now</a>
                                    </div>
                                </div>
                            </article>


                            <!--Pricing Column-->
                            <article class="pricing-column col-lg-4 col-md-4">
                                <div class="inner-box card-box">
                                    <div class="plan-header text-center">
                                        <h3 class="plan-title">Developer</h3>
                                        <h2 class="plan-price">$39</h2>
                                        <div class="plan-duration">Per Month</div>
                                    </div>
                                    <ul class="plan-stats list-unstyled text-center">
                                        <li>5 Projects</li>
                                        <li>1 GB Storage</li>
                                        <li>No Domain</li>
                                        <li>1 User</li>
                                        <li>24x7 Support</li>
                                    </ul>

                                    <div class="text-center">
                                        <a href="#" class="btn btn-success btn-bordred btn-rounded waves-effect waves-light">Signup Now</a>
                                    </div>
                                </div>
                            </article>

                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->
                
<div class="row">

                    <div class="col-sm-12">
                        <div class="timeline"> 
                            <h4 class="page-title">Timeline</h4>
                            <article class="timeline-item alt">
                                <div class="text-right">
                                    <div class="time-show first">
                                        <a href="#" class="btn btn-custom w-lg">Today</a>
                                    </div>
                                </div>
                            </article>
                            <article class="timeline-item alt">
                                <div class="timeline-desk">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <span class="arrow-alt"></span>
                                            <span class="timeline-icon bg-danger"><i class="mdi mdi-circle"></i></span>
                                            <h4 class="text-danger">1 hour ago</h4>
                                            <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                            <p>Dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="timeline-item ">
                                <div class="timeline-desk">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <span class="arrow"></span>
                                            <span class="timeline-icon bg-success"><i class="mdi mdi-circle"></i></span>
                                            <h4 class="text-success">2 hours ago</h4>
                                            <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                            <p>consectetur adipisicing elit. Iusto, optio, dolorum <a href="#">John deon</a> provident rerum aut hic quasi placeat iure tempora laudantium </p>

                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="timeline-item alt">
                                <div class="timeline-desk">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <span class="arrow-alt"></span>
                                            <span class="timeline-icon bg-primary"><i class="mdi mdi-circle"></i></span>
                                            <h4 class="text-primary">10 hours ago</h4>
                                            <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                            <p>3 new photo Uploaded on facebook fan page</p>
                                            <div class="album">
                                                <a href="#">
                                                    <img alt="" src="images/small/img1.jpg">
                                                </a>
                                                <a href="#">
                                                    <img alt="" src="images/small/img2.jpg">
                                                </a>
                                                <a href="#">
                                                    <img alt="" src="images/small/img3.jpg">
                                                </a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="timeline-item">
                                <div class="timeline-desk">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <span class="arrow"></span>
                                            <span class="timeline-icon bg-purple"><i class="mdi mdi-circle"></i></span>
                                            <h4 class="text-purple">14 hours ago</h4>
                                            <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                            <p>Outdoor visit at California State Route 85 with John Boltana &
                                                Harry Piterson regarding to setup a new show room.</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="timeline-item alt">
                                <div class="timeline-desk">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <span class="arrow-alt"></span>
                                            <span class="timeline-icon"><i class="mdi mdi-circle"></i></span>
                                            <h4 class="text-muted">19 hours ago</h4>
                                            <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                            <p>Jonatha Smith added new milestone <span><a href="#">Pathek</a></span>
                                                Lorem ipsum dolor sit amet consiquest dio</p>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <article class="timeline-item alt">
                                <div class="text-right">
                                    <div class="time-show">
                                        <a href="#" class="btn btn-custom w-lg">Yesterday</a>
                                    </div>
                                </div>
                            </article>
                            <article class="timeline-item">
                                <div class="timeline-desk">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <span class="arrow"></span>
                                            <span class="timeline-icon bg-warning"><i class="mdi mdi-circle"></i></span>
                                            <h4 class="text-warning">07 January 2016</h4>
                                            <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                            <p>Montly Regular Medical check up at Greenland Hospital by the
                                                doctor <span><a href="#"> Johm meon </a></span>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="timeline-item alt">
                                <div class="timeline-desk">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <span class="arrow-alt"></span>
                                            <span class="timeline-icon bg-primary"><i class="mdi mdi-circle"></i></span>
                                            <h4 class="text-primary">07 January 2016</h4>
                                            <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                            <p>Download the new updates of Ubold admin dashboard</p>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <article class="timeline-item">
                                <div class="timeline-desk">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <span class="arrow"></span>
                                            <span class="timeline-icon bg-success"><i class="mdi mdi-circle"></i></span>
                                            <h4 class="text-success">07 January 2016</h4>
                                            <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                            <p>Jonatha Smith added new milestone <span><a class="blue" href="#">crishtian</a></span>
                                                Lorem ipsum dolor sit amet consiquest dio</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="timeline-item alt">
                                <div class="text-right">
                                    <div class="time-show">
                                        <a href="#" class="btn btn-custom w-lg">Last Month</a>
                                    </div>
                                </div>
                            </article>

                            <article class="timeline-item alt">
                                <div class="timeline-desk">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <span class="arrow-alt"></span>
                                            <span class="timeline-icon"><i class="mdi mdi-circle"></i></span>
                                            <h4 class="text-muted">31 December 2015</h4>
                                            <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                            <p>Download the new updates of Ubold admin dashboard</p>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <article class="timeline-item">
                                <div class="timeline-desk">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <span class="arrow"></span>
                                            <span class="timeline-icon bg-danger"><i class="mdi mdi-circle">    </i></span>
                                            <h4 class="text-danger">16 Decembar 2015</h4>
                                            <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                            <p>Jonatha Smith added new milestone <span><a href="#">prank</a></span>
                                                Lorem ipsum dolor sit amet consiquest dio</p>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- end container -->


            