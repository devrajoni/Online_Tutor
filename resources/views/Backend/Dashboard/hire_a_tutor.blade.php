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



                                @if(Auth::user()->role == 1)


                                <div class="container-fluid">
                                    <div class="row">
                                      <div class="col-lg-12">
                                        <table class="table">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>Tutor Name</th>
                                                <th>Student Name</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                              @forelse($hire_tusions as $value)
                                              <tr>
                                                <td>{{$value->hire_tusion_reletion_to_tutor_id->name}}</td>
                                                <td>{{$value->hire_tusion_reletion_to_student_id->name}}</td>
                                                <td>
                                                  @if($value->status=='inactive')
                                                  <a class="btn btn-info" href="{{ url('Backend/inactive')}}/{{ $value->id}}">{{$value->status == 'inactive' ? 'Pending':''}}</a>
                                                  @else
                                                  <a class="btn btn-success" href="{{ url('Backend/active')}}/{{ $value->id}}">{{$value->status == 'active' ? 'Accept':''}}</a>
                                                  @endif
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
