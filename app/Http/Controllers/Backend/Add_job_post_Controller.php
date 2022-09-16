<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\add_job_post;
use App\Models\categories;
use App\Models\details;
use App\Models\message;
use App\Models\hire_tusion;
use App\Models\complain;
use App\Models\Order;
use App\Models\rating;
use App\Models\TutorTransaction;
use carbon\carbon;
use Auth;
use Session;
class Add_job_post_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $add_job_post = add_job_post::all();
      $categories_active = categories::where('status', 'Active')->get();
        return view('Backend/add_job/add_job_post', compact('add_job_post', 'categories_active'));
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


      $request->validate([
        'student_name' => 'required',
        'categories_id' => 'required',
        // 'job_heading' => 'required',
        'location' => 'required',
        'salary' => 'required',
        'available_time' => 'required',
        'in_details' => 'required',
      ]);

      add_job_post::insert([
     'job_id' => rand(1000, 900000),
     'student_name' => $request->student_name  ,
     'categories_id' => $request->categories_id  ,
    //  'job_heading' => $request->job_heading  ,
     'location' => $request->location  ,
    'salary' => $request->salary  ,
     'available_time' => $request->available_time  ,
      'in_details' => $request->in_details  ,
     'status' => 'Inactive',
      'created_at'  => carbon::now(),
   ]);
  return back()->with('message', "Your Information send successfully");




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
      $edit_data = add_job_post::findOrfail($id);
      $categories_active = categories::where('status', 'Active')->get();
        return view('Backend/add_job/edit_job_post', compact('edit_data', 'categories_active'));
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

      add_job_post::findOrfail($id)->update([
         'job_id' => $request->job_id,
         'student_name' => $request->student_name,
         'categories_id' => $request->categories_id,
         'job_heading' => $request->job_heading  ,
         'location' => $request->location  ,
         'salary' => $request->salary,
         'gender' => $request->gender,
         'subject' => $request->subject,
         'available_time' => $request->available_time,
          'in_details' => $request->in_details,
          'status' => $request->status,
      ]);
      session()->flash('message', 'Job Board Information Updated successfully');
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
      add_job_post::find($id)->delete();
      return back()->with('delete_message', "Add job Post  delete successfully");
    }
    public function dlt_student($id)
    {
      user::find($id)->delete();
      return back()->with('delete_message', "Student  delete successfully");
    }
    public function dlt_tutore($id)
    {
      user::find($id)->delete();
      return back()->with('delete_message', "Tutore  delete successfully");
}

    public function student_dashboard(){


      $tutor = hire_tusion::where('student_id', Auth::User()->id)->where('status', 'active')->get();
      return view('Backend.Dashboard.student', compact('tutor'));
    }
    public function complain_list(){
      $complain = array();
      if(Auth::User()->role==2){
        $complain = complain::where('student_id', Auth::User()->id)->get();

      }elseif(Auth::User()->role==3){
        $complain = complain::where('teacher_id', Auth::User()->id)->get();
      }
      return view('Backend.Dashboard.complain_list', compact('complain'));
    }
    public function complain_destroy($id){
      try {
        $complain = complain::find($id);
        $complain->delete();
        return back()->with('delete_message', "Tutore  delete successfully");
    } catch (\Throwable $th) {
        throw $th;
    }
    }
    public function tutor_dashboard(){

      $information = details::where('tutor_name', Auth::user()->id)->get();

      return view('Backend/Dashboard/tutore', compact('information'));
    }

    public function payment_transaction(){
      if(Auth::user()->role==3){
        $transactions = TutorTransaction::where('tutor_id',Auth::user()->id)->get();
      }else{
        $transactions = Order::where('student_id',Auth::user()->id)->get();
      }
      
      return view('Backend.payment_transaction',compact('transactions'));
    }

    public function message(){
      $message = message::all();
      return view('Backend/Dashboard/message', compact('message'));
    }
    public function hire_a_tutor(){
      $hire_tusions = hire_tusion::all();
      return view('Backend/Dashboard/hire_a_tutor', compact('hire_tusions'));
    }

    public function inactive($id){
      hire_tusion::findOrfail($id)->update([
          'status'=> 'active',
      ]);
      return back();
    }
    public function active($id){
      hire_tusion::findOrfail($id)->update([
          'status'=> 'inactive',
      ]);
      return back();
    }


    public function complain($id){
          $information = hire_tusion::where('id',$id)->first();
          return view('Backend.Dashboard.complain', compact('information'));
    }
    public function complain_insert(Request $request){

          $request->validate([
            'teacher_id'=> 'required',
            'problem'=> 'required',
          ]);
          complain::insert([
            'student_id' => Auth::user()->id,
            'teacher_id' => $request->teacher_id,
            'problem' => $request->problem,
             'created_at'=> carbon::now(),
          ]);
          return back()->with('message', 'complain send successfully');
    }

    public function rating($id){
          $information = hire_tusion::find($id);
          return view('Backend.Dashboard.rating', compact('information'));
    }

    public function rating_insert(Request $request){

          $request->validate([
            'teacher_id'=> 'required',
            'star'=> 'required',
          ]);
          rating::insert([
            'teacher_id' => $request->teacher_id,
            'star' => $request->star,
             'created_at'=> carbon::now(),
          ]);
          return back()->with('message', 'Rating send successfully');
    }

public function complain_message(){
  $message = complain::all();
  return view('Backend.Dashboard.complain_message', compact('message'));
}
public function pay_now($id){
  Session::put('payment_id',$id);
  return view('Backend.sslcommerze');
}

}
