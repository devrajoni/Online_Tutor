@extends('layouts.Frontend.app')
@section('content')

<!-- search section -->
<section class="py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <form  action="{{url('search/tutor')}}" method="post">
          @csrf
        <div class="input-group">
          <input class="form-control" type="text" placeholder="Search tutor..." name="search">
          <span class="input-group-prepend">
            <button type="submit" class="btn btn-info">Search</button>
          </span>
        </div>
      </form>
      </div>
    </div>
  </section>
  <!-- home section -->
  <section class="py-2">
    <div class="container">
      <div class="row">
        @foreach($categories_active as $value)
        <div class="col-md-3 col-sm-6  py-3">
          <div class="card card-home1">
            <div class="card-header bg-info">
              <h6>{{ $value->categories_name }}</h6>
            </div>
            <div class="card-body">
              <a href="{{url('categories/'.$value->id)}}">
                <img class="img-fluid card-img-center card-images1" src="{{asset('categories_photos/' .$value->photo)}}" alt="{{ $value->photo }}">
              </a>
            </div>
            <div class="card-footer bg-info">
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <!-- </div> -->
    </div>
  </section>
  <!-- slider -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 d-none d-sm-block">
          <div id="showcase" class="bg-dark">
            <div id="myCarousel" class="carousel slide slide-head" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-slide-to="0" data-target="#myCarousel" class="active"></li>
                <li data-slide-to="1" data-target="#myCarousel"></li>
                <li data-slide-to="2" data-target="#myCarousel"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item carousel-img-1 active">
                  <div class="container">
                    <div class="carousel-caption mb-3 pb-3 mb-sm-5 pb-sm-5 carousel-para m-auto">
                      <h5>A PROFESSIONAL TUTOR IN GULSHAN-2</h5>
                      <h6>WWW.DHAKATUTORS.COM<br><a href="#">Read More...</a></h6>
                    </div>
                  </div>
                </div>
                <div class="carousel-item carousel-img-2">
                  <div class="container">
                    <div class="carousel-caption mb-3 pb-3 mb-sm-5 pb-sm-5 carousel-para m-auto">
                      <h5>A BUET TUTOR IN DHANMONDI 7</h5>
                      <h6>WWW.DHAKATUTORS.COM<br><a href="#">Read More...</a></h6>
                    </div>
                  </div>
                </div>
                <div class="carousel-item carousel-img-3">
                  <div class="container">
                    <div class="carousel-caption mb-3 pb-3 mb-sm-5 pb-sm-5 carousel-para m-auto">
                      <h5>GROUP STUDY WITH TUTOR</h5>
                      <h6>WWW.DHAKATUTORS.COM<br><a href="#">Read More...</a></h6>
                    </div>
                  </div>
                </div>
              </div>
              <a href="#myCarousel" class="carousel-control-prev" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a href="#myCarousel" class="carousel-control-next" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- 2-column -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-6 py-4">
          <div class="card">
            <div class="card-body">
              <h3 class="column-text">MOST POPULAR CATAGORIES:</h3><hr>
              <div class="row">
                @foreach($categories_active as $value)
                  <div class="col-md-6 col-sm-6">
                  <ul>
                    <li><a href="{{url('categories/'.$value->id)}}"><strong>{{$value->categories_name}}</strong></a></li>
                  </ul>
                </div>
                @endforeach
              </div>
              <h6 class="text-warning"><marquee>Largest house tutor site in dhaka city. Hire the right tutor today. Hotline: L-09811018142, G-01322559851.</marquee></h6>
            </div>
          </div>
        </div>
        <div class="col-md-6 py-4 guidline">
          <div class="card">
            <div class="card-body">
              <h3 class="column-text">GUIDLINE:</h3><hr>
              <p>প্রশ্নঃ কিভাবে শিক্ষক খুঁজবো ?</p>
              <p>উত্তরঃ ফাইন্ড এ টিউটর সেকশন এ প্রবেশ করে আপনার নিকটস্থ লোকেশন চয়ন করুন এবং সাব ক্যাটাগরি থেকে উপযুক্ত শিক্ষক নির্বাচন করুন ও তাকে মেসেজ পাঠান or <a href="#"><u>Click here</u></a> to make a live circular.</p>
              <p>প্রশ্নঃ কিভাবে টিউশন পাব ?</p>
              <p>উত্তরঃ জব বোর্ড এ গিয়ে অ্যাপ্লাই করুন ।</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Premium tutor: -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col">
          <h3 class="pre-head"><i class="fa fa-rss text-info"></i> Premiun tutor:</h3><hr>
        </div>
      </div>
      <div class="row">
        @foreach($information as $value)
        @php
            $val =  App\Models\rating::where('teacher_id', $value->tutor_name)->count('teacher_id');
            $rating_val =  App\Models\rating::where('teacher_id', $value->tutor_name)->sum('star');
            $complain = App\Models\complain::where('teacher_id', $value->tutor_name)->count('teacher_id');
            if($complain>0 && $rating_val>0){
              $rating_val = $rating_val - $complain;
            }
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
        @endphp
        <div class="col-lg-2 col-md-4 col-sm-6 py-2">
          <div class="card bg-light">
            <div class="card-body pre-card">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <a href="#"><img src="{{ asset('categories_photos')}}/{{$value->photo}}" width="50"></a>
                </div>
                <div class="col-md-6 col-sm-6">
                  <h5 class="name">{{ $value->datils_reletion_to_user->name}}</h5>
                  <p class="namea">{{ $value->designation}}</p>
                </div>
                <p class="pre-text"><strong>Salary: <br> </strong> {{ $value->salary}} tk/month<br><a href="{{ url('tutor_details/'.$value->id)}}">click to view</a></p>
                <p>
                  @for($i=1; $i <= $rating_value; $i++)
                  <img src='{{asset('categories_photos/star.png')}}' alt='' width="15">
                  @endfor
                  @for($j = $rating_value+1; $j<=5; $j++ )
                  <img src='{{asset('categories_photos/A_star.png')}}' alt='' width="15">
                  @endfor
                <span>Review({{ $val}})</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- Authority -->
  <section class="py-4 thory">
    <div class="container">
      <div class="row">
        <div class="col">
          <h3 class="pre-head">Authority:</h3><hr>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-2 d-none d-md-block authority">
          <img src="{{asset('asset/Frontend/images/logo-1.png')}}" alt="Authority">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 py-4 authority">
          <h5 class="auth-paragrap">How www.onlinetutor.com interacts with guardian & tutor:</h5>
          <p>> If a tutor is looking for "home tuition" or "online tuitions" it.</p>
          <p>> "Home tutor wanted" or "home tutor bd" delivers our website as a result .</p>
          <p>> "Home tuition near me" also describes tuition job related search which.</p>
          <p>> "Home tuition advertisement" also redirect a tutor at the tuition job.</p>
          <p>> "Home tutor care", "home tutor job", "home tuition fee", "home tuition teacher", "tuitions", "part time tuition job", "home tuition teacher" also describes our site.</p>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card sidebar">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <a href="#"><img src="{{asset('asset/Frontend/images/lgo.png')}}"></a>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8">
                  <p class="slidebar-pera1"><strong><a class="slidebar-pera" href="#">Online tutor.com</a></strong><br> 2.7k like</p>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a class="icon-foot" href="#"><i class="fa fa-facebook-square icon1-foot"></i> Like pase</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row py-4">
        <div class="col-lg-8 col-md-8 col-sm-8 authority">
          <h4 class="auth-paragrap">Is it safe or not ???</h4>
          <p>Is's always a matter of consern that, this organization's tutor is really trusted or safe for my house. As we have an identity of website as well our office address and our registered tutor register to us by comming here and provide their institutional identity card for the authentication purpose, that's why we recommend you to hire tutor here and we always ensure the authentic true feedback towards you. You are most welcome to visit us at the distinct office address.</p>
          <p>www.dhakatutors.com provides best quality "tutor near you" as well "tutor near me", "private tutor near me", "private math tutors", "cheap tutors near me", "private tutoring job near me", "tutoring for kids", "tutors required", "find a tutor near me", "english tutoring job near me", "how much do a math tutor charge", "private math tutor near me". All in one solution is dhakatutors.com</p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <h3 class="auth-paragrap1">HOW IT WORKS</h3><hr>
          <p class="auth-paragrap2"><strong>Last update: january 20, 2022</strong></p>
          <ol type="1">
            <li>Choose a tutor's profile by clicking <a href="#"><u>advance search</u></a></li>
            <li>Send a message to the recipient tutor.</li>
            <li>If disered tutor not found, send a message to us.</li>
            <li>Our support team will match 30,000+ cv to provide you best tutor.<br>© Note: All rights reserved.</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

@endsection
