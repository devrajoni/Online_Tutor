@extends('layouts.app')
@section('backend_content')
<div class="wrapper">
<div class="container-fluid ">
  <div class="row">
    <div class="col-md-8">
      <div class="card-box">
                          <h4 class="m-t-0 header-title">All Categories Topics</h4>
                          @if(session('delete_message'))
                          <div class="alert alert-danger">
                              {{ session('delete_message')}}
                          </div>
                          @endif
                          <table class="table">
                              <thead class="thead-light">
                              <tr>
                                  <th>Topics name</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>

                                  @foreach($topics_all as $value)
                              <tr>
                                  <td>{{ $value->topics }}</td>
                                  <td>{{ $value->status }}</td>
                                  <td>
                                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a href="{{url('Backend/delete/categories_topics')}}/{{ $value->id }}" class="btn btn-danger  btn-icon waves-effect waves-light"><i class="fa fa-remove"></i> Delete</a>
                                        <a href="{{url('Backend/edit/categories_topics')}}/{{ $value->id }}" class="btn btn-info  btn-icon waves-effect waves-light"><i class="fa fa-pencil"></i> Edit</a>
                                      </div>
                                  </td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div>
    </div>
    <div class="col-md-4 bg-dark">
        <div class="card-box">
            <h4 class="m-t-0 m-b-30 header-title">Add categories topics</h4>
                <!-- success message start -->
            @if(session('message'))
            <div class="alert alert-info">
                {{ session('message')}}
            </div>
            @endif
            <!-- success message end -->
            <!-- error message start -->
            @error('topics')
            <div class="alert alert-info">
                {{ $message}}
            </div>
            @enderror
            <!-- error message end -->
            <form action="{{ route('Backend/add_categories_topics')}}" method="post">

              @csrf

                  <div class="form-group">
                    <label for="topics">Categories Topics</label>
                    <input type="text" class="form-control" id="topics" name="topics"  placeholder="Enter Categories topics">
                  </div>
                  <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="Active" value="Active">
                        <label class="form-check-label" for="Active">
                          Active
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="Inactive" value="Inactive">
                        <label class="form-check-label" for="Inactive">
                          Inactive
                        </label>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Add Topics</button>
              </form>
          </div>
      </div>
  </div>
</div>
</div>


@endsection
