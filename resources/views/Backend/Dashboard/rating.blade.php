@extends('layouts.app')

@section('backend_content')
<style>
  /* rating */
.rating-css div {
    color: #ffe400;
    font-size: 30px;
    font-family: sans-serif;
    font-weight: 800;
    text-align: center;
    text-transform: uppercase;
    padding: 20px 0;
  }
  .rating-css input {
    display: none;
  }
  .rating-css input + label {
    font-size: 60px;
    text-shadow: 1px 1px 0 #8f8420;
    cursor: pointer;
    color: #ffe400;
  }
  .rating-css input:checked + label ~ label {
    color: #f3f6f8;
  }
  .rating-css label:active {
    transform: scale(0.8);
    transition: 0.3s ease;
  }

/* End of Star Rating */

</style>
                <div class="wrapper">
                            <div class="container-fluid">

                                <!-- Page-Title -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="page-title-box">
                                            <div class="btn-group pull-right">
                                                <ol class="breadcrumb hide-phone p-0 m-0">
                                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                    <li class="breadcrumb-item active"><a href="#">Rating</a></li>
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
                                        <h5>Teacher Rating  Here...</h5>
                                          <form  action="{{url('rating_insert')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                              <label for="teacher_name">Teacher Id</label>
                                              <input   class="form-control"  value="{{ $information->hire_tusion_reletion_to_tutor_id->name }}" disabled>
                                              <input  type="text" class="form-control" id="teacher_name" name="teacher_id" value="{{ $information->tutor_id }}" hidden>
                                            </div>
                                            <div class="form-group">
                                              <label for="star">Review Star</label>
                                              <div class="rating-css">
                                                <div class="star-icon">
                                                    <input type="radio" value="1" name="star" checked id="rating1">
                                                    <label for="rating1" class="fa fa-star"></label>
                                                    <input type="radio" value="2" name="star" id="rating2">
                                                    <label for="rating2" class="fa fa-star"></label>
                                                    <input type="radio" value="3" name="star" id="rating3">
                                                    <label for="rating3" class="fa fa-star"></label>
                                                    <input type="radio" value="4" name="star" id="rating4">
                                                    <label for="rating4" class="fa fa-star"></label>
                                                    <input type="radio" value="5" name="star" id="rating5">
                                                    <label for="rating5" class="fa fa-star"></label>
                                                </div>
                                            </div>
                                            <button class="btn" type="submit">Submit</button>
                                          </form>
                                      </div>
                                    </div>
                                </div>
                                @endif


  @endsection
