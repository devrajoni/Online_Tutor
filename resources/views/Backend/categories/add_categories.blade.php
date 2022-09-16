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
                                  <th>Categoires name</th>
                                  <th>Categoires Topics</th>
                                  <th>Status</th>
                                  <th>Photo</th>
                                  <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>

                                @forelse($categories_all as $value)

                              <tr>
                                  <td>{{ $value->categories_name}}</td>
                                  <td>{{ $value->categories_reletion_to_categories_topics->topics}}</td>
                                  <td>{{ $value->status}}</td>
                                  <td> <img src="{{asset('categories_photos/' .$value->photo )}}" alt=" {{$value->photo}}" width="100"> </td>

                                  <td>
                                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a href="{{url('Backend/delete/categories/'.$value->id )}}" class="btn btn-danger  btn-icon waves-effect waves-light"><i class="fa fa-remove"></i> Delete</a>
                                        <a href="{{url('Backend/edit/categories/'.$value->id)}}" class="btn btn-info  btn-icon waves-effect waves-light"><i class="fa fa-pencil"></i> Edit</a>
                                      </div>
                                  </td>
                              </tr>
                              @empty
                              <tr>
                                <td colspan="5" align="center"> No More Data Available </td>
                              </tr>
                                @endforelse
                              </tbody>
                          </table>
                      </div>
    </div>
    <div class="col-md-4 bg-dark">
        <div class="card-box">
            <h4 class="m-t-0 m-b-30 header-title">Add categories</h4>
                <!-- success message start -->
            @if(session('message'))
            <div class="alert alert-info">
                {{ session('message')}}
            </div>
            @endif
            <!-- success message end -->
            <!-- error message start -->
            @if($errors->all())
            <div class="alert alert-info">
                @foreach($errors->all() as $er)
                <li>{{$er}}</li>
                @endforeach
            </div>
            @endif
            <!-- error message end -->
            <form action="{{ route('Backend/add_categories')}}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label for="categories_name">Categories Name</label>
                  <input type="text" class="form-control" id="categories_name" name="categories_name"  placeholder="Enter Categories" value="{{ old('categories_name')}}">
                </div>
                <div class="form-group">
                  <label for="categories">Categorie Topics</label>
                  <select class="form-select form-control" name="topics_id">
                        <option>....Select Your Categories Topics....</option>
                        @foreach($topics_active as $value)
                        <option value="{{$value->id}}">{{$value->topics}}</option>
                        @endforeach

                      </select>
                </div>
                <div class="form-group">
                  <label for="photo">Categories Photo</label>
                  <input type="file" class="form-control" id="photo" name="photo">
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
                  <button type="submit" class="btn btn-primary">Add Categories</button>
              </form>
          </div>
      </div>
  </div>
</div>
</div>


@endsection
