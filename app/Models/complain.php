<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complain extends Model
{
    use HasFactory;

    function complain_reletion_to_user(){
      return $this->hasOne('App\Models\User', 'id', 'teacher_id');
    }
    function student(){
      return $this->hasOne('App\Models\User', 'id', 'student_id');
    }
}
