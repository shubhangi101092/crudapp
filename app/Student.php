<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $fillable = ['first_name','last_name','parent_name','email','mobile_number','standard','course'];
      public function documents()
    {
        return $this->hasMany('App\Document', 'id');
    }
  }