<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\TutorTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Order::orderBy('id','desc')->get();
        return view('Backend.transaction.index',compact('transactions'));
    }
    public function send_teacher_payment($id){
        $transactions = Order::find($id);
        $tutor_trans =new TutorTransaction();
        $tutor_trans->student_id = $transactions->student_id;
        $tutor_trans->tutor_id = $transactions->tutor_id;
        $vat = $transactions->amount*10/100;
        $tutor_amount = $transactions->amount - $vat;
        $tutor_trans->amount = $tutor_amount;
        $tutor_trans->vat = $vat;
        $tutor_trans->save();
        return back()->with('message', 'Payment sucessfully Send');
        
    }
    public function tutor_transaction(){
        $transactions = TutorTransaction::orderBy('id','desc')->get();
        return view('Backend.transaction.tutor_transaction',compact('transactions'));
    }
    public function cancel_payment($id){
        $transactions = Order::find($id);
        $transactions->status = 'Cancel';
        $transactions->save();
        return back()->with('message', 'Payment sucessfully Cancel');
    }
}
