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
                                                    <li class="breadcrumb-item"><a href="#">Student</a></li>
                                                    <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
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
                                                            <a type="button" href="{{url('Backend/add_information')}}" class="btn btn-light waves-effect">
                                                                <i class="mdi mdi-account-settings-variant mr-1"></i> Add Your Information
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!--/ meta -->
                                    </div>
                                </div>
                                <!-- end row -->



                                @if(Auth::user()->role == 3)


                                  @foreach($information as $value)
                                <div class="container-fluid">
                                    <div class="row">
                                      <div class="col-lg-12">

                                        <div class="card find-hover">
                                            <div class="card-body">
                                              <div class="row">
                                                <div class="col-md-2">
                                                  <div>
                                                    <img class="find-img-1" src="{{ asset('categories_photos')}}/{{$value->photo}}" alt="" width="100">
                                                  </div>

                                                </div>
                                                <div class="col-md-5">
                                                  <h5 class="find-name1">{{ $value->datils_reletion_to_user->name}}</h5>
                                                  <p class="text-info"><strong class="text-danger">{{ $value->designation }}</strong><br><strong>Education: </strong>{{$value->education}}<br><strong>Background: </strong>{{$value->background}} <br /><strong>Available time: </strong>{{$value->available_time}}</p>
                                                  <p><strong>Salary: </strong>{{ $value->salary }} tk/month;<br><strong>Address: </strong>{{ $value->address}}</p>
                                                </div>
                                                <div class="col-md-5">
                                                  <p>Recruitment: {{ $value->created_at->Format('d:M:Y, h:i:s') }}</p>
                                                  <p><strong>Subject proficiency: </strong><br>{{$value->subject}}<br><strong>Tutoring :</strong><br><strong>Experience:</strong>{{$value->experience}}</p>
                                                </div>
                                              </div>
                                              <p><strong>Myself: </strong>{{$value->in_details}}</p>
                                              <a class="btn btn-info" href="{{url('Dashboard/edit_information/'. $value->id)}}">Edit Information</a>
                                            </div>
                                            <div>
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif


  @endsection
