@extends('layouts.Frontend.app')
@section('content')

<!-- PAGE 1 OF 112 -->
	<section class="py-4">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h5 class="job-head">TUITION JOB</h5>
					<p class="job-pera"><strong>> Premium member ? <a href="{{route('find_tutor')}}"><u>Click here</u></a></strong></p>
					<div class="row">
						<div class="col-md-10">
							<form action="{{url('job_board')}}" method="post">
								@csrf
							<div class="input-group">
									<span class="input-group-prepend">
										<button class="btn btn-info">Search</button>
									</span>
									<input class="form-control" type="text" placeholder="Search by location" name="search">

							</div>
							</form>
						</div>
					</div>
					<h5 class="job-head pt-4">PAGE 1 OF 2</h5>
					@if(session('message'))
					<div class="alert alert-success">
						{{session('message')}}
					</div>
					@endif
					@if($errors->all())
							<div class="alert alert-danger">
									@foreach($errors->all() as $e)
										{{ $e}}
									@endforeach
							</div>
					@endif
@forelse($add_job_post as $value)
					<div class="py-2">
						<div class="card">
							<div class="card-body job-card">
								<form  action="{{route('apply_job')}}" method="post">
									@csrf
									<input type="hidden" name="job_post_id" value="{{ $value->id }}">
									@Auth
									<input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
									<input type="hidden" name="student_name" value="{{ $value->student_name}}">
									@endauth
								<h5 class="job-id">Job ID: {{ $value->job_id }} </h5>
								<input type="hidden" name="student_name" value="{{ $value->student_name }}">
								<p><i class='fa fa-calendar-minus-o'></i> Publish date: {{ $value->created_at }}</p>
								<h5 class="text-info">{{ $value->job_heading }}</h5>
								<div class="row">
									<div class="col-md-4">
										<p><strong>Posted by: </strong><br> {{ $value->student->name ?? '' }}<br><strong><i class="fa fa-map-marker"></i> Location: </strong><br>{{ $value->location }}</p>
									</div>
									<div class="col-md-4">
										<p>
											@if($value->curriculum)
											<strong><i class="fa fa-info-circle"></i>Curriculum:</strong>{{ $value->curriculum }}<br>
											@endif
											@if($value->school)
											<i class="fa fa-info-circle"></i><strong>School: </strong>{{ $value->school }}<br>
											@endif
											@if($value->number_of_days)
											<i class="fa fa-info-circle"></i><strong>Days: </strong>{{ $value->number_of_days }} days/week<br>
											@endif
											@if($value->subject)
											<i class="fa fa-info-circle"></i>
											<strong>Subject: </strong>{{ $value->subject }}<br>
											@endif
											@if($value->available_time)
											<i class="fa fa-info-circle"></i>
											<strong>Available Time: </strong>{{ $value->available_time }}<br>
											@endif
											@if($value->salary)
											<i class="fa fa-info-circle"></i><strong>Salary: </strong> {{ $value->salary }} tk/month</p>
											@endif
									</div>
									<div class="col-md-4">
										<p><strong><i class='fa fa-comment'></i> -In details: <br></strong>{{ $value->in_details }}</p>
									</div>
									@guest
									<a class="btn btn-info" href="{{url('login')}}">Please Log-In than Job Apply</a>
									@endguest
									@auth

										@if(Auth::user()->role == 3)

											<button type="submit" class="btn btn-info">Details & Apply</button>
											@else
											<a href="{{url('register')}}">Register for Tutor than APPLY</a>
										@endif
									@endauth
								</div>
								</form>
							</div>
						</div>
					</div>
					@empty
					<div class="alert alert-danger text-center">
							No More data Available
					</div>
@endforelse
				</div>
				<div class="col-md-4 py-2">
					<div class="card">
						<div class="card-body">
							<h5 class="job-sidebar">HOW TO APPLY: </h5><br>
							<p class="job-sidebar-para"><strong>Last update: January 17, 2022</strong></p>
							<ol type="1" class="job-sidebar-paragraph">
								<li>Qualified anyone can apply for tuition.</li>
								<li>Registered Tutor get preferance for tuition.</li>
								<li>Premium member can make an id card at home page.<br>© Note: All rights reserved.</li>
								<h5 class="job-sidebar py-4">REGISTER LINK: </h5>
								<p class="job-pera"><strong>> Register as a tutor</strong> <a href="{{url('/register')}}"><u>Click here</u></a></p>
								<h5 class="job-sidebar">GUIDLINE:</h5>
								<p class="py-2">প্রশ্নঃ কিভাবে টিউশন পাব ?<br>উত্তরঃ জব বোর্ড এ গিয়ে অ্যাপ্লাই করুন ।</p>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection
