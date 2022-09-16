@extends('layouts.app')

@section('backend_content')

                <div class="wrapper">
                            <div class="container-fluid">

                                <!-- Page-Title -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="page-title-box">
                                            <div class="btn-group pull-right">
                                                <ol class="breadcrumb hide-phone p-0 m-0">
                                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                                    <li class="breadcrumb-item active"><a href="#">Complain</a></li>
                                                </ol>
                                            </div>
                                            <h4 class="page-title">Complain</h4>
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



                                @if(Auth::user()->role == 2)


                                <div class="container-fluid">
                                    <div class="row">
                                      <div class="offset-4 col-lg-4 bg-info p-3">
                                        @if(session('message'))
                                        <div class="alert alert-success">
                                            {{session('message')}}
                                        </div>
                                        @endif
                                        @if($errors->all())
                                        <div class="alert alert-success">
                                            @foreach($errors->all() as $e)
                                                <h6>{{ $e}}</h6>
                                            @endforeach
                                        </div>
                                        @endif
                                        <h5>Complain Here...</h5>
                                          <form  action="{{url('complain_insert')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                              <label for="teacher_name">Teacher Name</label>
                                              <input type="text" class="form-control" value="{{$information->hire_tusion_reletion_to_tutor_id->name}}">
                                              <input type="hidden" name="teacher_id" class="form-control" value="{{$information->hire_tusion_reletion_to_tutor_id->id}}">
                                            </div>
                                            <div class="form-group">
                                              <label for="problem">Please write your problem:</label>
                                              <textarea class="form-control" name="problem"></textarea>
                                            </div>
                                            <button class="btn" type="submit">Submit</button>
                                          </form>
                                      </div>
                                    </div>
                                </div>
                                @endif
                </div>
              </div>


  @endsection
