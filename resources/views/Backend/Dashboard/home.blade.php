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
                                    <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
                                    <li class="breadcrumb-item"><a href="#">Extra Pages</a></li>
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


                <div class="row">

@if(Auth::user()->role == 1)
                    <div class="offset-2 col-md-8">

                        <div class="row">

                            <div class="col-sm-4">
                                <div class="card-box tilebox-one">
                                    <i class="icon-layers float-right text-muted"></i>
                                    <h6 class="text-muted text-uppercase mt-0">All Student</h6>
                                    <h2 class="m-b-20" data-plugin="counterup">{{ App\Models\user::where('role', '2')->count('id')}}</h2>
                                  </div>
                            </div><!-- end col -->

                            <div class="col-sm-4">
                                <div class="card-box tilebox-one">
                                    <i class="icon-paypal float-right text-muted"></i>
                                    <h6 class="text-muted text-uppercase mt-0">All Tutor</h6>
                                    <h2 class="m-b-20"><span data-plugin="counterup">{{ App\Models\user::where('role', '3')->count('id')}}</span></h2>
                                </div>
                            </div><!-- end col -->

                            <div class="col-sm-4">
                                <div class="card-box tilebox-one">
                                    <i class="icon-rocket float-right text-muted"></i>
                                    <h6 class="text-muted text-uppercase mt-0">Total Memebers</h6>
                                    <h2 class="m-b-20" data-plugin="counterup">{{ App\Models\user::all()->count('id') -1}}</h2>
                                </div>
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->



                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
                <div class="row">
                  <div class="col-lg-3 bg-dark">
                    <div class="card-box">
                        <h4 class="header-title mb-3">All Student</h4>

                        <div class="table-responsive">
                            <table class="table m-b-0">
                                <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @forelse($all_student as $value)
                                <tr>
                                    <td>{{$value->name}}</td>
                                    <td>
                                      <a href="{{url('Backend/delete/student')}}/{{ $value->id }}" class="btn btn-danger  btn-icon waves-effect waves-light"><i class="fa fa-remove"></i> Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>

                                  <td colspan="2" align="center"> No more Student</td>
                                </tr>
                                  @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-3 bg-dark">

                    <div class="card-box">
                        <h4 class="header-title mb-3">All Tutore</h4>

                        <div class="table-responsive">
                            <table class="table m-b-0">
                                <thead>
                                <tr>
                                    <th>Tutore Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @forelse($all_tutor as $value)
                                <tr>
                                    <td>{{$value->name}}</td>
                                    <td>
                                      <a href="{{url('Backend/delete/tutore')}}/{{ $value->id }}" class="btn btn-danger  btn-icon waves-effect waves-light"><i class="fa fa-remove"></i> Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                  <td colspan="2" align="center"> No more tutore</td>
                                </tr>
                                  @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-6 bg-dark">
                    <div class="card-box">
                        <h4 class="header-title mb-3">APPLY Job</h4>
                          @if(session('alert_message'))
                            <div class="alert alert-danger">
                                {{ session('alert_message')}}
                            </div>
                          @endif
                        <div class="table-responsive">
                            <table class="table m-b-0">
                                <thead>
                                <tr>
                                    <th>Tutore Name</th>
                                    <th>Student Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @forelse($job_apply as $value)
                                <tr>
                                    <td>{{$value->job_apply_reletion_to_user_id->name}}</td>
                                    <td>{{$value->job_apply_reletion_to_studendName_id->name}}</td>
                                    <td>
                                      @if($value->status=='inactive')
                                      <a class="btn btn-info" href="{{ url('Dashboard/inactive')}}/{{ $value->id}}">{{$value->status == 'inactive' ? 'Pending':''}}</a>
                                      @else
                                      <a class="btn btn-success" href="{{ url('Dashboard/active')}}/{{ $value->id}}">{{$value->status == 'active' ? 'Accept':''}}</a>
                                      @endif
                                     </td>
                                    <td>
                                      <a href="{{ url('Dashboard/delete')}}/{{ $value->id}}" class="btn btn-danger  btn-icon waves-effect waves-light"><i class="fa fa-remove"></i> Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                  <td colspan="2" align="center"> No more tutore</td>
                                </tr>
                                  @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
                </div>


            </div> <!-- end container -->
        </div>
@endif


@endsection
