<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable =
[
'categories_name',
'topics_id',
'photo',
'status',
];
    function categories_reletion_to_categories_topics(){
      return $this->hasOne('App\Models\categories_topics', 'id', 'topics_id');
    }
}
