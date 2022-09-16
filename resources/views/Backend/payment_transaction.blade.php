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
                                    <li class="breadcrumb-item active">Payment</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Payment</h4>
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
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-lg-12">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th>SL</th>
                                @if(Auth::user()->role==3)
                                <th>Student Name</th>
                                <th>Amount</th>
                                <th>Vat</th>
                                @else
                                <th>Tutor Name</th>
                                <th>Amount</th>
                                <th>Status</th>
                                @endif
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($transactions as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                @if(Auth::user()->role==3)
                                    <td>{{$item->student->name}}</td>
                                    <td>{{$item->amount}}</td>                      
                                    <td>{{$item->vat}}</td>  
                                @else
                                <td>{{$item->tutor->name}}</td>
                                <td>{{$item->amount}}</td>                      
                                <td>
                                    @php
                                    if($item->status == 'Completed' || $item->status == 'Processing'){
                                        echo  "<div class='badge badge-success badge-shadow'>Completed</div>";
                                    }elseif($item->status == 'Cancel'){
                                        echo  "<div class='badge badge-danger badge-shadow'>Cancel</div>";
                                    }else{
                                        echo  "<div class='badge badge-info badge-shadow'>Pending</div>";
                                    }
                                @endphp
                                </td>                      
                                @endif                 
                                <td>{{$item->created_at}}</td>                   
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
                {{-- @endif --}}
            </div>
        </div>

  @endsection
