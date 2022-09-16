<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categories_topics;
use App\Models\Categories;
use carbon\carbon;

class Categories_topics_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $topics_all = categories_topics::all();
        return view('Backend/categories_topics/add_categoryes_topic', compact('topics_all'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // echo "<pre>";
      // print_r($request->all());
      $request->validate([
        'topics' => 'required|unique:categories_topics',
        'status' => 'required',
      ]);
       categories_topics::insert([
      'topics'  => $request->topics,
      'status'  => $request->status,
      'created_at'  => carbon::now(),
    ]);
  return back()->with('message', "categories topics created insered successfully");
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

     */
    public function edit($id)
    {
      $categories_topics =  categories_topics::find($id);
       return view('Backend/categories_topics/categories_topic_edit', compact('categories_topics'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      categories_topics::findOrfail($id)->update([
        'topics' => $request->topics,
        'status' => $request->status,
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
        categories_topics::find($id)->delete();
        return back()->with('delete_message', "categories topics delete successfully");

    }
}
