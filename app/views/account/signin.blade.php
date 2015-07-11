@extends('layout.landingmain')

@section('content')

    @include('layout.landinglogin-top')   

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Welcome to the Silver Jubilee Reunion</h1>
                <hr>
                <p>IIT Madras Batch of 1990 - Silver Jubilee Reunion</p>
                <button type="button" class="btn btn-primary btn-xl wow tada" data-toggle="modal" data-target="#myModalRegister">
	              Register
	            </button
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">About</h2>
                    <hr class="light">
                    <p class="text-faded">Welcome to the IIT Madras Batch of 1990 Silver 
                    Jubilee reunion portal. To view the latest updates on the progress towards
                    the reunion please visit the Blog by clicking the button below.</p>
                    <a href="#" class="btn btn-default btn-xl">View Blog</a>
                </div>
            </div>
        </div>
    </section>

    <section id="accomodation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Accomodation</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-lg-offset-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-bed wow bounceIn text-primary"></i>
                        <h3>Taramani Guest House</h3>
                        <p class="text-muted">+91 (44) 2257 8450, 8449</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>Ginger Hotel</h3>
                        <p class="text-muted">+91 44 6666 3333</p>
                    </div>
                </div>                
            </div>
        </div>
    </section>

    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6">
                    <a href="http://www.gingerhotels.com/chennai-hotel-profile" target="_alt" class="portfolio-box">
                        <img src="{{ URL::asset('img/portfolio/1.jpg') }}" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Accomodation
                                </div>
                                <div class="project-name">
                                    Ginger Hotel
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="https://www.iitm.ac.in/guesthouses" target="_alt" class="portfolio-box">
                        <img src="{{ URL::asset('img/portfolio/2.jpg') }}" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Accomodation
                                </div>
                                <div class="project-name">
                                    Taramani Guest House
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="{{ URL::asset('img/portfolio/3.jpg') }}" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
               
            </div>
        </div>
    </section>

    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Already Registered for the reunion? Click on the button below to Login</h2>
                <!-- Button trigger modal -->
	            <button type="button" class="btn btn-default btn-xl wow tada" data-toggle="modal" data-target="#myModalLogin">
	              Login
	            </button>
                
            </div>
        </div>
    </aside>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="primary">
                    <p>If you face any issues while registering, please contact us.</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>123-456-6789</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:your-email@your-domain.com">srinivasa32@hotmail.com</a></p>
                </div>
            </div>
        </div>
    </section> 

		<!-- Modal -->
        <div class="modal fade" id="myModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Login to the Silver Jubilee Portal</h4>
              </div>
              <div class="modal-body col-sm-12 col-md-10 col-md-offset-1">
	                <div class="social-login">
						<a class="btn btn-block btn-lg btn-social btn-google-plus" href="{{ URL::route('account-sign-in-googleplus') }}">
							<i class="fa fa-google-plus"></i> Sign in using Google Plus
						</a>
					</div>
					<div class="social-login">
						<a class="btn btn-block btn-lg btn-social btn-linkedin" href="{{ URL::route('account-sign-in-linkedin') }}">
							<i class="fa fa-linkedin"></i> Sign in using Linkedin
						</a>
					</div>
					<div class="social-login">
						<a class="btn btn-block btn-lg btn-social btn-facebook" href="{{ URL::route('account-sign-in-facebook') }}">
							<i class="fa fa-facebook"></i> Sign in using Facebook
						</a>
					</div>
	          </div>
              <div class="modal-footer ">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModalRegister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Register on the Silver Jubilee Portal</h4>
              </div>
              <div class="modal-body col-sm-12 col-md-10 col-md-offset-1">
	                <div class="social-login">
						<a class="btn btn-block btn-lg btn-social btn-google-plus" href="{{ URL::route('account-sign-in-googleplus') }}">
							<i class="fa fa-google-plus"></i> Register using Google Plus
						</a>
					</div>
					<div class="social-login">
						<a class="btn btn-block btn-lg btn-social btn-linkedin" href="{{ URL::route('account-sign-in-linkedin') }}">
							<i class="fa fa-linkedin"></i> Register using Linkedin
						</a>
					</div>
					<div class="social-login">
						<a class="btn btn-block btn-lg btn-social btn-facebook" href="{{ URL::route('account-sign-in-facebook') }}">
							<i class="fa fa-facebook"></i> Register using Facebook
						</a>
					</div>
	          </div>
              <div class="modal-footer ">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

    @include('layout.login-bottom')

@stop

@section('jscontent')
	
@stop