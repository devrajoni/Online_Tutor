
<!DOCTYPE html>
<html>
<head>
	<title>online private tutor</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/Frontend/css/style.css')}}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('asset/Frontend/images/lo.png')}}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">
	@yield('css')
</head>
<body>
	<section>
		<div class="row new-header bg-white">
		  <div class="col-sm-1"></div>
		  <div class="col-sm-8">
			<h2 class="new-h2">Private Tutor Finder System</h2>
		  </div>
		  <div class="col-sm-3">
			@guest
			<a  class="btn btn-info btn-sm mt-3 "  href="{{ route('login') }}">Login</a>
			<a  class="btn btn-info btn-sm mt-3 ml-3" href="{{ route('register') }}">Sign Up</a>
			@endguest
			@auth
			<a  class="btn btn-info btn-sm mt-3" href="{{ route('login') }}" target="_blank">Dashboard</a>

			<a  class="btn btn-info btn-sm mt-3 ml-3" href="{{ route('logout') }}"
					onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">Logout</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
					@csrf
					</form>
			@endauth
		  </div>
		</div>
	</section>
	<nav class="navbar sticky-top navbar-dark bg-dark navbar-bg navbar-expand-md">
		<div class="container">
		  <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarNav">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div id="navbarNav" class="collapse navbar-collapse">
			<ul class="navbar-nav">
				<li class="nav-item ">
				  <a class="nav-link {{ request()->is('/')? 'active':''}}" href="{{url('/')}}">Home</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link {{ request()->is('find_tutor')? 'active':''}}" href="{{route('find_tutor')}}">Find A Tutor</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link {{ request()->is('job_board')? 'active':''}}" href="{{route('job_board')}}">Job Board</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link {{ request()->is('hire_tutor')? 'active':''}}" href="{{route('hire_tutor')}}">Hire A Tutor</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link {{ request()->is('about')? 'active':''}}" href="{{route('about')}}">About Us</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link {{ request()->is('faq')? 'active':''}}" href="{{route('faq')}}">FAQ</a>
				</li>
			</ul>
			
		  </div>
		</div>
	  </nav>
