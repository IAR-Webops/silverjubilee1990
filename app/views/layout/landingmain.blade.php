<!DOCTYPE html>
<html lang="en">
    <head>        
    	 <!-- META SECTION -->
        <title>Batch of 1990 - Silver Jubilee</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta charset="UTF-8">
        <meta name="description" content="IIT Madras Alumni Connect">
        <meta name="keywords" content="IIT,Madras,Alumni,Connect">
        <meta name="author" content="Yash Murty">
        <meta name="_token" content="{{ csrf_token() }}" />

        <link rel="icon" href="{{ URL::asset('img/IIT_Madras_Logo_30.png') }}" type="image/x-icon" />
        <!-- END META SECTION -->
        {{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'); }}             
        <!-- CSS INCLUDE -->  
        <!-- Loading Bootstrap -->
        <!-- Custom Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>


        <!-- Loading Font Awesome and Social Bootstrap -->
        {{ HTML::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); }}             
        {{ HTML::style('css/bootstrap-social.css'); }}   

        <!-- Plugin CSS -->
        {{ HTML::style('css/animate.min.css'); }}     

        <!-- Custom CSS -->
        {{ HTML::style('css/creative.css'); }}     

        <!-- EOF CSS INCLUDE -->      

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
        <!--[if lt IE 9]>
          {{ HTML::script('js/vendor/html5shiv.js'); }}
          {{ HTML::script('js/vendor/respond.min.js'); }} 
        <![endif]-->                               
    </head>                                        
	<body id="page-top">
	   
            @yield('content')


    	

    <!-- START SCRIPTS -->

        <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
        {{ HTML::script('js/vendor/jquery.min.js'); }}        
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        
        {{ HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'); }}

        <!-- Plugin JavaScript -->
        {{ HTML::script('js/jquery.easing.min.js'); }}
        {{ HTML::script('js/jquery.fittext.js'); }} 
        {{ HTML::script('js/wow.min.js'); }}
        
        <!-- Custom Theme JavaScript -->
        {{ HTML::script('js/creative.js'); }} 

     
    </body>
</html><!-- Yash Murty -->