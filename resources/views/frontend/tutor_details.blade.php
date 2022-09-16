@extends('layouts.Frontend.app')
@section('content')

<section class="py-4">
		<div class="container">
			<h3 class="find-head1">ALL TUTOR PROFILE IN DHAKA.</h3>
			<div class="row">
				<div class="col-md-12">
					@if(session('message'))
					<div class="alert alert-info">
							{{ session('message') }}
					</div>
					@endif
				<div class="card find-hover mb-2">
						<div class="card-body">
							<div class="row">
								<div class="col-md-2">
									<div>
										<img class="find-img-1" src="{{ asset('categories_photos')}}/{{$value->photo}}" alt="" width="100">
										<h6 class="find-id">
												<?php
												 $val =  App\Models\rating::where('teacher_id', $value->tutor_name)->count('teacher_id');
												 $rating_val =  App\Models\rating::where('teacher_id', $value->tutor_name)->sum('star');
												$complain = App\Models\complain::where('teacher_id', $value->tutor_name)->count('teacher_id');
												if($complain>0 && $rating_val>0){
													$rating_val = $rating_val - $complain;
												}
												// dd($rating_val);
												if($rating_val>0){
														if($val + $rating_val==0){
															$rating_value = 0;
														}else{
															$rating_value = ($rating_val/$val);
														}
												}else{
													$rating_value = 0;
												}
												$rating_value = number_format($rating_value);
												
												?>
												@for($i=1; $i <= $rating_value; $i++)
												<img src='{{asset('categories_photos/star.png')}}' alt='' width="15">
												@endfor
												@for($j = $rating_value+1; $j<=5; $j++ )
												<img src='{{asset('categories_photos/A_star.png')}}' alt='' width="15">
												@endfor
								  <br>
											<span>Review({{ $val}})</span></h6>
									</div>

								</div>
								<div class="col-md-5">
									<h5 class="find-name1">{{ $value->datils_reletion_to_user->name}}</h5>
									<p class="text-info"><strong class="text-danger">{{ $value->designation }}</strong><br><strong>Education: </strong>{{$value->education}}<br><strong>Background: </strong>{{$value->background}}</p>
									<p><strong>Salary: </strong>{{ $value->salary }} tk/month;<br><strong>Address: </strong>{{ $value->address}}</p>
								</div>
								<div class="col-md-5">
									<p>Recruitment: {{ $value->created_at->Format('d:M:Y, h:i:s') }}</p>
									<p><strong>Subject proficiency: </strong><br>{{$value->subject}}<br><strong>Tutoring :</strong><br><strong>Experience:</strong>{{$value->experience}}</p>
								</div>
							</div>
							<p><strong>Myself: </strong>{{$value->in_details}}</p>
							@if(!empty($complain) && !empty($rating_val))

							@if($rating_val > 0)
							<form action="{{url('tusion_apply')}}" method="post">
								@csrf
							@auth
							<input type="hidden" name="tutor_id" value="{{$value->tutor_name}}">
								<input type="hidden" name="student_id" value="{{auth::user()->id}}">
							<button type="submit" class="btn btn-info">Hire a Tutor </button>
							@endauth
							@guest
							<a href="{{url('login')}}">Please log-in than Hire a tutor</a>
							@endguest
							</form>
							@endif
							@else
							<form action="{{url('tusion_apply')}}" method="post">
								@csrf
							@auth
							<input type="hidden" name="tutor_id" value="{{$value->tutor_name}}">
								<input type="hidden" name="student_id" value="{{auth::user()->id}}">
							<button type="submit" class="btn btn-info">Hire a Tutor </button>
							@endauth
							@guest
							<a href="{{url('login')}}">Please log-in than Hire a tutor</a>
							@endguest
							</form>
							@endif
						</div>
						<div>
						</div>
					</div>
				</div>

			</div>
			</div>
		</section>

@endsection
