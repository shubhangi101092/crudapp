<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    protected $fillable = ['students_id','file_path','type'];
    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
