<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\details;
use carbon\carbon;
use Image;
class BackendController extends Controller
{
    public function categories_topics(){
      return view('Backend/add_categoryes_topic');
    }

public function add_information(){
  $categories_all = Categories::where('status', "Active")->get();
  return view('Backend.Dashboard.add_information', compact('categories_all'));
}
public function add_information_insert(Request $request){


  $request->validate([
    'tutor_name'      => 'required|unique:details',
    'gender'          => 'required',
    'categories_id'   => 'required',
    'designation'     => 'required',
    'education'       => 'required',
    'background'      => 'required',
    'salary'          => 'required',
    'address'         => 'required',
    'subject'         => 'required',
    'experience'      => 'required',
    'in_details'      => 'required',
    'phone'           => 'required',
  ]);
  if($request->hasFile('photo')){
    $photo = $request->file('photo');
    $photos_name =  time(). rand(100, 100000) . '.' . $photo->GetClientOriginalextension();
    Image::make($photo)->resize(110, 140)->save(base_path('public/categories_photos/' . $photos_name), 100);
  }
  else{
    $photos_name = "User-Default.jpg";
  }

details::insert([
  'tutor_name'      =>$request->tutor_name,
  'gender'          =>$request->gender,
  'categories_id'   =>$request->categories_id,
  'designation'     =>$request->designation,
  'education'       =>$request->education,
  'background'      =>$request->background,
  'salary'          =>$request->salary,
  'address'         =>$request->address,
  'subject'         =>$request->subject,
  'experience'      =>$request->experience,
  'in_details'      =>$request->in_details,
  'photo'           =>$photos_name,
  'phone'           =>$request->phone,
  'status'          =>'active',
  'created_at'      => carbon::now(),
]);
return redirect('Dashboard/tutore');
}

public function edit_information($id){
  $categories_all = Categories::where('status', "Active")->get();
  $edit_information = details::findOrfail($id);
  return view('Backend.Dashboard.edit_information', compact('edit_information', 'categories_all'));
}

public function information_update(Request $request){
  $request->validate([
    'gender'          => 'required',
    'categories_id'   => 'required',
    'designation'     => 'required',
    'education'       => 'required',
    'background'      => 'required',
    'salary'          => 'required',
    'address'         => 'required',
    'subject'         => 'required',
    'experience'      => 'required',
    'in_details'      => 'required',
    'phone'           => 'required',
    'available_time'  => 'required',
    'video_link'  => 'required',
  ]);

  if($request->hasFile('photo')){
    $photo = $request->file('photo');
    $photos_name =  time(). rand(100, 100000) . '.' . $photo->GetClientOriginalextension();
    Image::make($photo)->resize(110, 140)->save(base_path('public/categories_photos/' . $photos_name), 100);
    if(details::findOrfail($request->id)->product_photos !=='User-Default.jpg'){
      unlink(base_path('public/Dashboard/photos/'. details::findOrfail($request->id)->photo));
    }
  }
  else{
   $photos_name = details::findOrfail($request->id)->photo;
  }

  details::findOrfail($request->id)->update([
    'tutor_name'      =>$request->tutor_name,
    'gender'          =>$request->gender,
    'categories_id'   =>$request->categories_id,
    'designation'     =>$request->designation,
    'education'       =>$request->education,
    'background'      =>$request->background,
    'salary'          =>$request->salary,
    'address'         =>$request->address,
    'subject'         =>$request->subject,
    'experience'      =>$request->experience,
    'in_details'      =>$request->in_details,
    'photo'           =>$photos_name,
    'phone'           =>$request->phone,
    'video_link'      =>$request->video_link,
    'available_time'  =>$request->available_time,
    'status'          =>'active',
    'created_at'      => carbon::now(),
  ]);
return redirect('Dashboard/tutore');


}




}
