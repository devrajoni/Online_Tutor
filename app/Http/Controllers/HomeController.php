<?php

namespace App\Http\Controllers;

use App\Models\hire_tusion;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\job_apply;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_student =user::where('role', '2')->get();
        $all_tutor =user::where('role', '3')->get();
        $job_apply =job_apply::all();
        return view('Backend.Dashboard.home', compact('all_student', 'all_tutor', 'job_apply'));
    }

    public function inactive($id){
      
      $job_apply = job_apply::findOrfail($id);
      $hire_tutor = hire_tusion::where('student_id',$job_apply->student_name)->where('tutor_id',$job_apply->user_id)->first();
      if($hire_tutor){
        return back()->with('alert_message', "Already Hired");
      }else{
        job_apply::findOrfail($id)->update([
            'status'=> 'active',
        ]);
        $hire_tutor = new hire_tusion();
        $hire_tutor->student_id = $job_apply->student_name;
        $hire_tutor->tutor_id = $job_apply->user_id;
        $hire_tutor->status = 'active';
        $hire_tutor->save();
      }
      return back();
    }
    public function active($id){
      job_apply::findOrfail($id)->update([
          'status'=> 'inactive',
      ]);
      return back();
    }

    public function destroy($id)
    {
        job_apply::find($id)->delete();
        return back()->with('delete_message', "delete successfully");

    }




}
