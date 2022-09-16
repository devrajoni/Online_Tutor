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
                                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                    <li class="breadcrumb-item active"><a href="#">Guardian Recommandation</a></li>
                                                </ol>
                                            </div>
                                            <h4 class="page-title">Guardian Recommandation</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- end page title end breadcrumb -->

                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- meta -->
                                        <div class="profile-user-box card-box bg-custom">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="text-left">
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
                                                    </div>
                                                </div>
                                                    <!-- <span class="pull-left mr-3"><img src="assets/images/users/avatar-1.jpg" alt="" class="thumb-lg rounded-circle"></span> -->
                                                </div>

                                            </div>
                                        </div>
                                        <!--/ meta -->
                                    </div>
                                </div>
                                <!-- end row -->



                                @if(Auth::user()->role == 1)


                                <div class="container-fluid">
                                    @if(session('message'))
                                        <div class="alert alert-success">
                                            {{session('message')}}
                                        </div>
                                    @endif
                                    <div class="row">
                                      <div class="col-lg-12">
                                        <table class="table">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>Student Name</th>
                                                <th>Tutor Name</th>
                                                <th>Salary Received</th>
                                                <th>Vat</th>
                                                <th>Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                              @forelse($transactions as $value)
                                              <tr>
                                                <td>{{$value->student->name}}</td>
                                                <td>{{$value->tutor->name}}</td>
                                                <td>{{$value->amount}}</td>
                                                <td>{{$value->vat}}</td>
                                                <td>{{$value->created_at}}</td>
                                                
                                                
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
