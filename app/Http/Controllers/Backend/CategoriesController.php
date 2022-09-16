<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categories_topics;
use App\Models\Categories;
use carbon\carbon;
use Image;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics_active = categories_topics::where('status', "Active")->get();
        $categories_all = Categories::all();
        return view('Backend/categories/add_categories', compact('topics_active', 'categories_all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestuest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    $request->validate([
      'categories_name' => 'required|unique:categories',
      'topics_id' => 'required',
      'photo' => 'required',
      'status' => 'required',
    ]);
    if($request->hasFile('photo')){
      $photo = $request->file('photo');
      $photos_name =  time(). rand(100, 100000) . '.' . $photo->GetClientOriginalextension();
      Image::make($photo)->resize(385, 250)->save(base_path('public/categories_photos/' . $photos_name), 100);
    }
    else{
      $photos_name = "User-Default.jpg";
    }

    Categories::insert([
      'categories_name' => $request->categories_name,
      'topics_id' => $request->topics_id,
      'photo' => $photos_name,
      'status' => $request->status,
      'created_at' => carbon::now(),
    ]);
    return back()->with("message", "Inserted successfully");

}


     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $topics_active = categories_topics::where('status', "Active")->get();
      $categories =  categories::find($id);
       return view('Backend/categories/edit_categories', compact('categories', 'topics_active'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestuest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if($request->hasFile('photo')){
        $photo = $request->file('photo');
        $photos_name =  time(). rand(100, 100000) . '.' . $photo->GetClientOriginalextension();
        Image::make($photo)->resize(213, 138)->save(base_path('public/categories_photos/' . $photos_name), 100);
        // if(Categories::findOrfail($request->id)->product_photos !=='User-Default.jpg'){
        //   unlink(base_path('public/categories_photos/'. Categories::findOrfail($request->id)->photo));
        // }
      }
      else{
       $photos_name = Categories::findOrfail($request->id)->photo;
      }

      Categories::findOrfail($request->id)->update([
        'categories_name'      =>$request->categories_name,
        'topics_id'      =>$request->topics_id,
        'photo'      =>$photos_name,
        'status'          =>$request->status,
        'created_at'      => carbon::now(),
      ]);
      session()->flash('message', 'categories Updated successfully');
      session()->flash('type', 'success');
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //   if(Categories::find($id)->photo !=='User-Default.jpg'){
    //   $photos = Categories::find($id)->photo;
    //   unlink(base_path('public/categories_photos/'. $photos ));
    // }
    Categories::find($id)->delete();
    return back()->with('delete_message', "categories  delete successfully");

    }
}
