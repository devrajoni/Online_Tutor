@extends('layouts.student_and_teacher')

@section('student_tutor')

                <div class="wrapper">
                            <div class="container-fluid">

                                <!-- Page-Title -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="page-title-box">
                                            <div class="btn-group pull-right">
                                                <ol class="breadcrumb hide-phone p-0 m-0">
                                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                                    <li class="breadcrumb-item active">Profile</li>
                                                </ol>
                                            </div>
                                            <h4 class="page-title">Profile</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- end page title end breadcrumb -->

                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- meta -->
                                        <div class="profile-user-box card-box bg-custom">
                                            <div class="row">
                                                    <!-- <span class="pull-left mr-3"><img src="assets/images/users/avatar-1.jpg" alt="" class="thumb-lg rounded-circle"></span> -->
                                                    <div class="media-body text-white">
                                                        <h4 class="mt-1 mb-1 font-18">{{Auth::user()->name}}</h4>
                                                        <p class="font-13 text-light">
                                                          <?php
                                                            if(Auth::user()->role==1){
                                                              echo "Super Admin";
                                                            }
                                                            elseif(Auth::user()->role==2){
                                                              echo "Student";
                                                            }
                                                            else{
                                                              echo "tutore";
                                                            }

                                                         ?>
                                                        </p>
                                                        <div class="text-left">
                                                            <button type="button" class="btn btn-light waves-effect">
                                                                <i class="mdi mdi-account-settings-variant mr-1"></i> Edit Profile
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!--/ meta -->
                                    </div>
                                </div>
                                <!-- end row -->
                @if(Auth::user()->role == 2)
                @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif
                <div class="container-fluid">
                    <div class="row">
                      <div class="col-lg-12">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th>Tutor Name</th>
                                <th>Photo</th>
                                <th>Rating</th>
                                <th>Phone</th>
                                <th>Tk.</th>
                                <th>Demo Video</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              @forelse($tutor as $value)
                              <tr>
                                <td>{{$value->hire_tusion_reletion_to_tutor_id->name}}</td>
                                <td> <img src="{{asset('categories_photos')}}/{{$value->hire_tusion_reletion_to_details->photo}}" alt="" width="100"> </td>
                                <td>
                                  <?php
                                  $val = 0;
                                  $rating_val = 0;
                                  $val =  App\Models\rating::where('teacher_id', $value->tutor_id)->count('teacher_id');
                                  $rating_val =  App\Models\rating::where('teacher_id', $value->tutor_id)->sum('star');
                                  $complain = App\Models\complain::where('teacher_id', $value->tutor_id)->count('teacher_id');
                                  if($complain>0 && $rating_val>0){
                                    $rating_val = $rating_val - $complain;
                                  }
                                  if($val + $rating_val==0){
                                    $rating_value = 0;
                                  }else{
                                    $rating_value = ($rating_val/$val);
                                  }
                                  $rating_value = number_format($rating_value);
                                  ?>
                                  
                                  @for($i=1; $i <= $rating_value; $i++)
                                   <img src='{{asset('categories_photos/star.png')}}' alt='' width="30">
                                   @endfor
                                   @for($j = $rating_value+1; $j<=5; $j++ )
                                   <img src='{{asset('categories_photos/A_star.png')}}' alt='' width="30">
                                   @endfor
                                  <span>Review({{ $val}})</span>

                                </td>
                                <td>{{$value->hire_tusion_reletion_to_details->phone}}</td>
                                <td>{{$value->hire_tusion_reletion_to_details->salary}} /Tk</td>
                                @php $str = $value->hire_tusion_reletion_to_details->video_link;
                                  $y_link=(explode("=",$str));
                                @endphp
                                
                                <td>
                                  @if(!empty($y_link[1]))
                                  @php $link = $y_link[1]; @endphp
                                  <div class="embed-responsive embed-responsive-16by9" style="height: 120px; width: 200px">
                                    <iframe class="embed-responsive-item" width="680" height="370" src="https://www.youtube.com/embed/{{$link}}" frameborder="0" allow="accelerometer; 
                                      autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                               @endif
                                  
                                </td>
                                <td>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('pay-now',$value['id'])}}" class="btn btn-sm btn-warning">Paynow</a>
                                    <a href="{{url('complain')}}/{{$value->id}}" class="btn btn-danger">Complain</a>
                                    <a href="{{url('rating')}}/{{$value->id}}"  class="btn btn-primary">Rating</a>
                                    </div>
                                </td>
                              </tr>
                              @empty
                              <tr>
                                <td colspan="12" align="center">No more Data Available</td>
                              </tr>
                              @endforelse
                            </tbody>
                        </table>
                      </div>

                    </div>
                </div>
                @endif
  @endsection
