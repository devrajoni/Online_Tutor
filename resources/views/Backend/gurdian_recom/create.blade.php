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
                                                        <a type="button" href="{{route('Backendguardian-recommendation.index')}}" class="btn btn-light waves-effect">
                                                            <i class="mdi mdi-account-settings-variant mr-1"></i> Manage Guardian Recommandation
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

                                @if(session('message'))
                                <div class="alert alert-success">
                                    {{session('message')}}
                                </div>
                                @endif
                                <div class="container-fluid" style="margin-bottom: 25px;">
                                    <div class="row">
                                        <div class="offset-2 col-sm-8 bg-info p-2">
                                          <form action="{{route('Backendguardian-recommendation.store')}}" method="post" enctype="multipart/form-data">
                                            <h2>Add Guardian recommendation</h2>
                                            @csrf
                                                <div class="form-group">
                                                    <label for="background">Name</label>
                                                    <input type="text" class="form-control" id="background" name="name"  placeholder="Enter Name" value="{{ old('name')}}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="background">Image</label>
                                                    <input type="file" class="form-control" id="background" name="image"  placeholder="Enter background" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="subject">Description</label>
                                                    <textarea name="description" class="form-control"  placeholder="Enter Recommandation" required>{{ old('description')}}</textarea>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="background">Publication Status</label>
                                                    <select name="status" id="" class="form-control">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                              <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endif


  @endsection
