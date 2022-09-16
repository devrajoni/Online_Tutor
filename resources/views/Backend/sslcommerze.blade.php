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

                <div class="span9">
            
                    <div align="center">
                        <h3>Continue to Pay</h3>
                         <p>please Make payment by clicking on below Payment Button</p>
                         <div>
                            <button class="your-button-class" id="sslczPayBtn"
                                token="if you have any token validation"
                                postdata="your javascript arrays or objects which requires in backend"
                                order="If you already have the transaction generated for current order"
                                endpoint="/pay-via-ajax"> Pay Now
                            </button>
                        </div>
                    </div>
            
                </div>
                @endif

                <script>
                  (function (window, document) {
                      var loader = function () {
                          var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                          script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                          tag.parentNode.insertBefore(script, tag);
                      };
              
                      window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
                  })(window, document);
              </script>
  @endsection
