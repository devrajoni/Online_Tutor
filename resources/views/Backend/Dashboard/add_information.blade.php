@extends('layouts.student_and_teacher')

@section('student_tutor')

                <div class="wrapper">
                            <div class="container-fluid">

                                <!-- Page-Title -->
                                <div class="row">
                                    <div class="offset-2 col-sm-8 bg-info p-2">
                                      <form action="{{route('Backend/add_information_insert')}}" method="post" enctype="multipart/form-data">
                                        <h2>Add your Information</h2>
                                        @csrf
                                          <div class="row">
                                              <div class="col-6">
                                                <div class="form-group">
                                                  <label for="tutor_name">Tutor name</label>
                                                @auth
                                                  <input type="text" class="form-control"  value="{{ Auth::user()->name }}" disabled>
                                                  <input type="hidden" class="form-control" id="tutor_name" name="tutor_name"   value="{{ Auth::user()->id }}">
                                                @endauth
                                                </div>
                                              </div>
                                              <div class="col-6">

                                                <div class="form-group">
                                                  <label for="gender"> Gender  </label>
                                                  <select class="form-select form-control" name="gender">
                                                    <option value="0">..... Gender.......</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="others">Others</option>
                                                </select>
                                              </div>
                                          </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-6">
                                                <div class="form-group">
                                                  <label for="categories">Categories</label>
                                                  <select class="form-select form-control" name="categories_id">
                                                        <option>....Select Your Categories....</option>
                                                        @foreach($categories_all as $value)
                                                        <option value="{{$value->id}}" >{{$value->categories_name}}</option>
                                                        @endforeach
                                                      </select>
                                                </div>
                                              </div>
                                              <div class="col-6">
                                                <div class="form-group">
                                                  <label for="designation">Designation</label>
                                                  <input type="text" class="form-control" id="designation" name="designation"  placeholder="Enter designation" value="{{ old('designation')}}">
                                                </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-6">
                                                <div class="form-group">
                                                  <label for="education">Education</label>
                                                  <input type="text" class="form-control" id="education" name="education"  placeholder="Enter education" value="{{ old('education')}}">
                                                </div>
                                              </div>
                                              <div class="col-6">
                                                <div class="form-group">
                                                  <label for="background">Background</label>
                                                  <input type="text" class="form-control" id="background" name="background"  placeholder="Enter background" value="{{ old('background')}}">
                                                </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-6">
                                                <div class="form-group">
                                                  <label for="salary">Salary</label>
                                                  <input type="text" class="form-control" id="salary" name="salary"  placeholder="Enter Salary" value="{{ old('salary')}}">
                                                </div>
                                              </div>
                                              <div class="col-6">
                                                <div class="form-group">
                                                  <label for="address">Address</label>
                                                  <input type="text" class="form-control" id="address" name="address"  placeholder="Enter address" value="{{ old('address')}}">
                                                </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-6">
                                                <div class="form-group">
                                                  <label for="subject">Subject proficiency</label>
                                                  <textarea name="subject" class="form-control"  placeholder="Enter  subject proficiency">{{ old('subject')}}</textarea>
                                                </div>
                                                </div>
                                                <div class="col-6">
                                                  <div class="form-group">
                                                    <label for="in_details">Myself</label>
                                                    <textarea name="in_details" class="form-control"  placeholder="Enter In details">{{ old('in_details')}}</textarea>
                                                  </div>
                                                </div>

                                            </div>
                                          <div class="row">
                                            <div class="col-6">
                                              <div class="form-group">
                                                <label for="experience">Experience</label>
                                                <input type="text" class="form-control" id="experience" name="experience"  placeholder="Enter experience" value="{{ old('experience')}}">
                                              </div>
                                            </div>
                                            <div class="col-6">
                                              <div class="form-group">
                                                <label for="photo">Photos</label>
                                                <input class="form-control"  type="file" name="photo" >
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-6">
                                              <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control" id="phone" name="phone"  placeholder="Enter phone" value="{{ old('phone')}}">
                                              </div>
                                            </div>
                                          </div>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end page title end breadcrumb -->




  @endsection
