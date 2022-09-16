<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job_apply extends Model
{
    use HasFactory;
    protected $fillable = ['status'];

    function job_apply_reletion_to_user_id(){
      return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    function job_apply_reletion_to_studendName_id(){
      return $this->hasOne('App\Models\User', 'id', 'student_name');
    }





}
