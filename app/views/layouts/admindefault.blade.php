<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<!--STYLESHEET-->
		<link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />		
		<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/v4.0.0/build/css/bootstrap-datetimepicker.css" rel="stylesheet"/>    
	    {{ HTML::style('css/padelAdminCustom.css') }}
	    
	    <!-- SCRIPTS -->
	    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
		<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/v4.0.0/src/js/bootstrap-datetimepicker.js"></script>
		
		<!-- Modernizr -->
		
		<title>PBM ADMIN</title>
	</head>

	<!-- BODY -->
	<body>
	<!-- HEADER -->
	<header  class="navbar navbar-default navbar-static-top">
		<nav class='container' role='navigation'>
			<div class="navbar-header">
				<a href="{{ URL::to('admin') }}" class="navbar-brand"> 
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
				<li><a href="{{ URL::to('admin/reservations') }}">Reservations</a></li>					
				<li><a href="{{ URL::to('#') }}">Tournaments</a></li>
				<li><a href="{{ URL::to('admin/matches') }}">Matches</a></li>
				<li><a href="{{ URL::to('admin/discharge') }}">Discharge</a></li>
				<li><a href="{{ URL::to('#') }}">Users</a></li>
				<li><a href="{{ URL::to('users/logout') }}">Logout</a></li>						
			</ul>				
		</nav>
	</header>
	
	<!-- MAIN CONTENT -->
	<div class='container'>
	
	@yield('content')
	
	</div>
	

	<!--FOOTER-->			
	<div class='footer'>
      <div class='container'>
        <div class='row'>
        	<p>PBM &copy; 2015</p>
        </div>
      </div>
    </div>

	</body>
</html>
