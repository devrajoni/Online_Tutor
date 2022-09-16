@extends('layouts.app')
@section('backend_content')
<div class="wrapper">
<div class="container-fluid ">
  <div class="row">

    <div class=" offset-4 col-md-4 bg-dark my-1">
        <div class="card-box">
            <h4 class="m-t-0 m-b-30 header-title">Add categories topics</h4>
            @if(session('message'))
            <div class="alert alert-{{ session('type') }}">
                {{ session('message')}}
            </div>
            @endif
            <form action="{{route('Backend/categories_topics_update', $categories_topics->id)}}" method="post">
              @csrf
                  @method('PUT')
                  <div class="form-group">
                    <label for="topics">Categories Topics</label>
                    <input type="text" class="form-control" id="topics" name="topics"  value="{{ $categories_topics->topics }}">
                  </div>
                  <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="Active" value="Active" {{ $categories_topics->status=='Active'? 'checked':''}} >
                        <label class="form-check-label" for="Active">
                          Active
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="Inactive" value="Inactive" {{ $categories_topics->status=='Inactive'? 'checked':''}}>
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
