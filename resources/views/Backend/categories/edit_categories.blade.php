@extends('layouts.app')
@section('backend_content')
<div class="wrapper">
<div class="container-fluid ">
  <div class="row">

    <div class=" offset-4 col-md-4 bg-dark my-1">
        <div class="card-box">
            <h4 class="m-t-0 m-b-30 header-title">Update categories</h4>
            @if(session('message'))
            <div class="alert alert-{{ session('type') }}">
                {{ session('message')}}
            </div>
            @endif
            <form action="{{route('Backend/categories_update', $categories->id)}}" method="post" enctype="multipart/form-data">
              @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="categories_name">Categories Name</label>
                  <input type="text" class="form-control" id="categories_name" name="categories_name"   value="{{ $categories->categories_name}}">
                </div>
                <div class="form-group">
                  <label for="categories">Categorie Topics</label>
                  <select class="form-select form-control" name="topics_id">
                        <option>....Select Your Categories Topics....</option>
                        @foreach($topics_active as $value)
                        <option value="{{$value->id}}" {{$value->id? 'selected':''}}>{{$value->topics}}</option>
                        @endforeach

                      </select>
                </div>
                <div class="form-group">
                  <label for="photo">Categories Photo</label>
                  <input type="file" class="form-control" id="photo" name="photo">
                </div>

                  <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="Active" value="Active" {{ $categories->status=='Active'? 'checked':''}}>
                        <label class="form-check-label" for="Active">
                          Active
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="Inactive" value="Inactive" {{ $categories->status=='Inactive'? 'checked':''}}>
                        <label class="form-check-label" for="Inactive">
                          Inactive
                        </label>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Update Categories</button>
              </form>
          </div>
      </div>
  </div>
</div>
</div>


@endsection
