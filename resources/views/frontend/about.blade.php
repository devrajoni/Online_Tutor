@extends('layouts.Frontend.app')
@section('content')

<!-- about us -->
<section class="py-4">
	<div class="container">
		<div class="row py-4">
			<div class="col-md-6">
				@if(session('message'))
					<div class="alert alert-success">
							{{ session('message')}}
					</div>
				@endif

				<div class="card">
					<div class="card-body">
						<h5 class="about-id">Office Address :</h5>
						<div class="row">
							<div class="col-md-6 text-info">
								<h6>Room no-408, Ibrahim Mansion 11, Purana Paltan, Dhaka, 1207 Bangladesh.</h6>
								<h6>Email: info@onlinetutors.com</h6>
								<h6>Mobile: +8801221018192</h6>
							</div>
						</div>
						<h5 class="about-id mt-4">Office Address :</h5>
						<div class="">
							<iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.8223908687!2d90.27923710646988!3d23.78088745708454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1641064210993!5m2!1sen!2sbd" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
						</div>
						<h5 class="about-id">Send a message to us:</h5>
						@if($errors->all())
							<div class="alert alert-danger">
									@foreach($errors->all() as $e)
									<h5>{{$e}}</h5>
									@endforeach
							</div>
						@endif
						<div class="card">
							<div class="card-body about-card-form">
								<form action="{{ url('send_message')}}" method="post">
									@csrf
									<div class="form-group">
										<label class="text-white"><strong>Your Name :</strong></label>
										<input type="text" name="name" placeholder="Name" class="form-control form-control-md" value="{{old('name')}}">
									</div>
									<div class="form-group">
										<label class="text-white"><strong>Your contact number :</strong></label>
										<input class="form-control" type="text" name="phone" placeholder="Active number"  value="{{old('phone')}}">
									</div>
									<div class="form-group">
										<label class="text-white"><strong>Your Message :</strong></label>
										<textarea cols="5" rows="3" class="form-control" placeholder="Massage" name="message"> {{old('message')}}</textarea>                                   </div>
										<input class="form-control btn btn-sm bg-info text-white" type="submit" name="" value="Send a massage">
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-body">
							<h5 class="about-id">Why it matter to choose tutor from here :</h5>
							<p class="mt-4">Is's always a matter of concern that, this organization's tutor is really trusted or safe for my house. As we have an identity in website as well our office address and our registered tutor register to us by comming here and provide their institutional identity card for the authentication purpose, that's why we recommend you to hire tutor from here and we always ensure the authentic true feedback towards you. You are most welcome to visit us at the distinct office address.</p>
							<h5 class="about-id mt-4">How it works :</h5>
							<img class="about2-img" src="{{asset('asset/Frontend/images/about2.jpg')}}" alt="about2">
							<ol type="1" class="mt-4">
								<li>Choose a tutor's profile that you like most by clicking catagory</li>
								<li>Send a message to the recipient tutor</li>
								<li> Make a live circular at Job Board by clicking HIRE TUTOR</li>
								<li>Directly call to our customer service number</li>
							</ol>
							<h5 class="about-id mt-2">Facebook Page :</h5>
							<div class="card">
								<div class="card-body about-bg-img">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-4">
											<a href="#"><img src="images/lgo.png"></a>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-8">
											<p class="text-white"><strong><a class="text-white" href="#">Onlinetutor.com</a></strong><br> 2.7k like</p>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<a class="bg-white" href="#"><i class="fa fa-facebook-square"></i> Like pase</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection
