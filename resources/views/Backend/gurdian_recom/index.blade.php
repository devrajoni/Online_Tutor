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
                                                <div class="col-md-6">
                                                    <div class="text-right">
                                                        <a type="button" href="{{route('Backendguardian-recommendation.create')}}" class="btn btn-light waves-effect">
                                                            <i class="mdi mdi-account-settings-variant mr-1"></i> Add Gurdian Recommandation
                                                        </a>
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
                                    <div class="row">
                                      <div class="col-lg-12">
                                        <table class="table">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Details</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                              @forelse($recommends as $value)
                                              <tr>
                                                <td>{{$value->name}}</td>
                                                <td><img src="{{$value->image}}" alt="" width="45px" height="40px"></td>
                                                <td>{{$value->description}}</td>
                                                <td>
                                                    @php
                                                        if($value->status == 1){
                                                            echo  "<div class='badge badge-success badge-shadow'>Active</div>";
                                                        }else{
                                                            echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
                                                        }
                                                    @endphp
                                                </td>
                                                <td>
                                                    <a href="{{route('Backendguardian-recommendation.edit',$value->id)}}" class="btn-sm btn-info"><i class="fa fa-edit"></i></a>
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
