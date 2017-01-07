<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
		<!--STYLESHEET-->
		<link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />	
		<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/v4.0.0/build/css/bootstrap-datetimepicker.css" rel="stylesheet"/>	    
	    {{ HTML::style('css/padelCustom.css') }}
	    
	    <!-- SCRIPTS -->
	    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
		<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/v4.0.0/src/js/bootstrap-datetimepicker.js"></script>
		<!--  Flexslider -->
		
		<!-- Modernizr -->

		<title>PBM</title>

	</head>

	<!-- BODY -->
	<body>
		<!-- HEADER -->
		<header  class="navbar navbar-inverse navbar-fixed-top">
			<nav class='container' role='navigation'>
				<div class="navbar-header">
					<a href="{{ URL::to('/') }}" class="navbar-brand"> 
						{{ HTML::image('img/logo.jpg', 'PBM') }}
					</a>
					<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='.navbar-collapse'>
				        <span class='sr-only'>Toggle navigation</span>
				        <span class='icon-bar'></span>
				        <span class='icon-bar'></span>
				        <span class='icon-bar'></span>
			        </button>
				</div>
				<ul class="nav navbar-nav navbar-right collapse navbar-collapse">
					<li><a href='#'>Tournaments</a></li>
					<li><a href="{{ URL::to('matches') }}">Matches</a></li>
					<li><a href='#'>Lessons</a></li>
					<li><a href='#'>Facilities</a></li>
					<?php  if(Auth::check()){ ?>
						<li><a href="{{ URL::to('users/logout') }}">Logout</a></li>
					<?php  } else { ?>
						<li><a href="{{ URL::to('users/login') }}">LogIn</a></li>
						<li><a href="{{ URL::to('users/create') }}">SignIn</a></li>	
					<?php  } ?>				
				</ul>				
			</nav>
		</header>

		<div class="container">
		
		@yield('inner-banner')<!-- VISOR IMAGENES-->
			
		</div>
			
		<div class="container">
	
		@yield('content')<!-- BOOKING, CONTACT FORM,  -->
		
		</div>

<!--FOOTER-->			
	<div class='footer'>
      <div class='container'>
        <div class='row'>
          <div class='col-sm-4 col-md-3 col-xs-6'>
            <h4>Who We Are</h4>
            <p><i>Padel Game</i> is the easiest way to {{ link_to_route('matches', 'arrange a match') }}!</p>
            <p><a href="#">More About Us <i class="glyphicon glyphicon-arrow-right"></i></a></p>
          </div>
          <div class='col-md-offset-1 col-sm-2 col-xs-6'>
            <h4>Links</h4>
            <ul class="list-unstyled">
              <li><a href='/'>Home</a></li>
              <li><a href='tickets.html'>Tournaments</a></li>
              <li><a href="{{ URL::to('matches') }}">Matches</a></li>
              <li><a href="#">Facilities</a></li>
              <li><a href="#">Login/Account</a></li>
            </ul>
          </div>
          <div class='clearfix visible-xs'></div>
          <div class='col-sm-2 col-xs-6'>
            <h4>Stay in Touch</h4>
            <ul class="list-unstyled">              
              <li><a href='http://twitter.com/TODO'>Twitter</a></li>
              <li><a href='http://facebook.com/TODO'>Facebook</a></li>
              <li><a href='http://Googleplus.com/TODO'>Google</a></li>
              <li><a href='http://Instagram.com/TODO'>Instagram</a></li>    
              <li><a href='http://Skype.com/TODO'>Skype</a></li>    
              <li><a href='http://Youtube.com/TODO'>Youtube</a></li>            
            </ul>
          </div>
          <div class='col-md-3 col-md-offset-1 col-sm-4 col-xs-6'>
            <h4>Contact Us</h4>            
            <ul class="list-unstyled">
            	<li><a href="mailto:someone@example.com?Subject=Hello%20again" target="_top">Contact</a></li>
              <li>Miami Central, FL <i class="glyphicon glyphicon-map-marker"></i></li>
              <li><i class='glyphicon glyphicon-phone'></i> 5-555-5555-5555</li>
              <li><a href="mailto:someone@example.com?Subject=Hello%20again" target="_top">contact@pbm.com <i class="glyphicon glyphicon-envelope"></i></a></li>
            </ul>
            <p>Miami Padel Game &copy; 2015</p>
          </div>
        </div>
      </div>
    </div>

	</body>
</html>
