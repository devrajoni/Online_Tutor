@extends('layouts.app')
@section('backend_content')
<div class="wrapper">
<div class="container-fluid ">
  <div class="row">
    <div class="col-md-12 p-0 m-0">
      <div class="">
            <h4 class="m-t-0 header-title">All Job Post</h4>
            @if(session('delete_message'))
            <div class="alert alert-danger">
                {{ session('delete_message')}}
            </div>
            @endif
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th>job_heading</th>
                    <th>location</th>
                    <th>salary</th>
                    <th>subject</th>
                    <th>Available Time</th>
                    <th>in_details</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @forelse($add_job_post as $value)
                  <tr>
                    <td>{{$value->job_heading}}</td>
                    <td>{{$value->location}}</td>
                    <td>{{$value->salary}}</td>
                    <td>{{$value->subject}}</td>
                    <td>{{$value->available_time}}</td>
                    <td>{{$value->in_details}}</td>
                    <td>{{$value->status}}</td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="{{url('Backend/delete/add_job_post/'.$value->id )}}" class="btn btn-danger  btn-icon waves-effect waves-light"><i class="fa fa-remove"></i> Delete</a>
                        <a href="{{url('Backend/edit/add_job_post/'.$value->id)}}" class="btn btn-info  btn-icon waves-effect waves-light"><i class="fa fa-pencil"></i> Edit</a>
                      </div>
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
</div>
</div>


@endsection
