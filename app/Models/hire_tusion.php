<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hire_tusion extends Model
{
    use HasFactory;
    protected $fillable = ['status'];

    function hire_tusion_reletion_to_tutor_id(){
      return $this->hasOne('App\Models\User', 'id', 'tutor_id');
    }
    function hire_tusion_reletion_to_student_id(){
      return $this->hasOne('App\Models\User', 'id', 'student_id');
    }
    function hire_tusion_reletion_to_details(){
      return $this->hasOne('App\Models\details', 'tutor_name', 'tutor_id');
    }
}
