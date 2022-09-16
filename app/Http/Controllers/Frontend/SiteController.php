<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\add_job_post;
use App\Models\categories_topics;
use App\Models\Categories;
use App\Models\complain;
use App\Models\job_apply;
use App\Models\details;
use App\Models\GurdianRecom;
use App\Models\hire_tusion;
use App\Models\message;
use App\Models\User;
use carbon\carbon;
use Exception;
use Session;
use Hash;

class SiteController extends Controller
{
    public function index(){
      $categories_active = Categories::where('status', 'Active')->get();
      $information = details::where('status', 'active')->get();
      return view('frontend/home', compact('categories_active', 'information'));
    }
    public function find_tutor(){
      $information = details::where('status', 'active')->get();
      $topics_all = categories_topics::where('status', 'Active')->get();
      $categories_active = Categories::where('status', 'Active')->get();
      return view('frontend/find_tutor', compact('categories_active', 'topics_all', 'information'));
    }
    public function job_board(Request $request){
      if($request->search){
        $add_job_post = add_job_post::where('location', 'LIKE', '%'.  $request->search .'%')->get();
      }
      else{
        $add_job_post = add_job_post::orderBy('id','desc')->where('status', "Active")->get();
      }
      return view('frontend/job_board', compact('add_job_post'));
    }
    public function hire_tutor(){
      $recommandation = GurdianRecom::where('status',1)->get();
      $categories_active = categories::where('status', 'Active')->get();
      return view('frontend/hire_tutor', compact('categories_active','recommandation'));
    }
    public function about(){
      return view('frontend/about');
    }
    public function faq(){
      return view('frontend/faq');
    }

public function apply_job(Request $request){

  $request->validate([
    'job_post_id' => 'required',
    'user_id' => 'required',
  ]);
  if(job_apply::where('job_post_id',  $request->job_post_id)->where('user_id', $request->user_id)->exists()){
    return back()->with('message', 'You already Apply for Job');
  }
  else{
    job_apply::insert([
   'job_post_id'  => $request->job_post_id,
   'user_id'  => $request->user_id,
   'student_name'  => $request->student_name,
   'status'  => 'inactive',
   'created_at'  => carbon::now(),
 ]);
 return back()->with('message', "Apply for job successfully");
}

}

public function categories($id){
    $categories_active = categories::where('status', 'Active')->get();
  $information = details::where('categories_id', $id)->get();
  return view('frontend/categories', compact('categories_active', 'information'));
}
public function search(Request $request){
      $categories_active = categories::where('status', 'Active')->get();
  $search_value = $request->search;
  $information = details::where('designation', 'LIKE' , '%'. $search_value .'%')->Orwhere('address', 'LIKE' , '%'. $search_value .'%')->Orwhere('subject', 'LIKE' , '%'. $search_value .'%')->Orwhere('education', 'LIKE' , '%'. $search_value .'%')->Orwhere('salary', 'LIKE' , '%'. $search_value .'%')->get();
  return view('frontend/search', compact('information', 'categories_active'));
}

public function tutor_details($id){
  $value = details::findOrfail($id);
  return view('frontend/tutor_details', compact('value'));
}

public function tusion_apply(Request $request){
  if(hire_tusion::where('student_id',  $request->student_id)->where('tutor_id', $request->tutor_id)->exists()){
    return back()->with('message', 'You already Send Hire Request In this Tutor');
  }
  else{

    hire_tusion::insert([
      'student_id' => $request->student_id,
      'tutor_id' => $request->tutor_id,
      'status' => 'inactive',
      'created_at' => carbon::now(),
    ]);
    return back()->with('message', 'Hire Tutor request successfully');
}

}

public function send_message(Request $request){
  echo "<pre>";
  print_r($request->all());
  $request->validate([
    'name'    =>'required',
    'phone'   =>'required',
    'message' =>'required',
  ]);
  message::insert([
    'name'    =>$request->name,
    'phone'   =>$request->phone,
    'message' =>$request->message,
    'created_at'=> carbon::now(),
  ]);
return back()->with('message', 'Send message successfully..');



}
public function otp(Request $request){
  $user = User::where('phone',$request->phone)->first();
  Session::put('phone',$request->phone);
  $phone = $request->phone;
  $user->verification_code = rand(100000,999999);
  $user->update();
  if($user){
        define("SERVER", "http://sms.mydokani.com");
        define("API_KEY", "27c448c42af46bb038f37e7860670c51c7a54ffa");
        define("USE_SPECIFIED", 0);
        define("USE_ALL_DEVICES", 1);
        define("USE_ALL_SIMS", 1);
        $msg = $this->sendSingleMessage($user->phone, "Your Reset Password Otp is ".$user->verification_code);
        return redirect()->route('reset-otp-password')->with('message', 'Otp send Successfully');
  }else{
    return back()->with('message', 'User Not found..');
  }
}

public function reset_password(Request $request){
  $user = User::where('phone',$request->phone)->first();
  if($user->verification_code==$request->otp){
    $user->password = Hash::make($request->password);
    $user->update();
    return redirect()->route('login')->with('message', 'Passwors successfully Changed..');
  }else{
    return back()->with('message', 'Somethings Went Wrong..');
  }
}
public function reset_password_otp(){
  return view('auth.passwords.otp');
}

function sendSingleMessage($number, $message, $device = 0, $schedule = null, $isMMS = false, $attachments = null, $prioritize = false)
    {
        $url = SERVER . "/services/send.php";
        $postData = array(
            'number' => $number,
            'message' => $message,
            'schedule' => $schedule,
            'key' => API_KEY,
            'devices' => $device,
            'type' => $isMMS ? "mms" : "sms",
            'attachments' => $attachments,
            'prioritize' => $prioritize ? 1 : 0
        );
        return $this->sendRequest($url, $postData)["messages"][0];
    }
    function sendRequest($url, $postData)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch));
        }
        curl_close($ch);
        if ($httpCode == 200) {
            $json = json_decode($response, true);
            if ($json == false) {
                if (empty($response)) {
                    throw new Exception("Missing data in request. Please provide all the required information to send messages.");
                } else {
                    throw new Exception($response);
                }
            } else {
                if ($json["success"]) {
                    return $json["data"];
                } else {
                    throw new Exception($json["error"]["message"]);
                }
            }
        } else {
            throw new Exception("HTTP Error Code : {$httpCode}");
        }
    }


}
