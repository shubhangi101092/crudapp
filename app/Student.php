<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $fillable = ['first_name','last_name','parent_name','email','mobile_number','standard','course'];
      public function documents()
    {
        return $this->hasMany('App\Document', 'id','students_id');
    }


    public function getStudent($id = '') {
      try {
       if(!empty(Student::all())){
         return response()->json([
             "students"=>(!empty($id))? Student::find($id): Student::all()->toArray(),
             "message" => (!empty($id))? "Record found":"All students record."
         ], 200);
       }else{
         return response()->json([
             "message" => "No record found."
         ], 204);
       }


     } catch (\Exception $ex) {
       return ['status' => false, 'message' => $ex->getMessage()];
   }
    }

   public function destroyStudent($id) {
     try {
       $student = Student::find($id);
       if($student){
           $student->delete();
           return response()->json([
               "message" => "record deleted"
             ], 200);
       } else {
        return response()->json([
           "message"=>"No data Found",
       ], 204);
     }
   } catch (\Exception $ex) {
      return ['status' => false, 'message' => $ex->getMessage()];
 }
   }
  }