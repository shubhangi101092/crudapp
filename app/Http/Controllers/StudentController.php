<?php

namespace App\Http\Controllers;
use App\Student;
use App\Document;
use Validator;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(!empty(Student::all())){
        return response()->json([
            "students"=>Student::all()->toArray(),
            "message" => "All students record."
        ], 201);
      }else{
        return response()->json([
            "message" => "No record found."
        ], 201);
      }
        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
     try{
         
        $validator = Validator::make($request->all() , [

            'first_name' => 'required|string',
            'last_name' => 'string',
            'email' => 'required|email|unique:students',
            'mobile_number' => 'integer',
            'course' => 'required|string',
            'parent_name' => 'string'
        ]);


        if($validator->fails()){

            return response()->json([
                "message"=>"Failed to create",
                "errors" => $validator->errors()
            ], 422);

        }
      
    
      $studnets= Student::create($request->all());
       if($request->birth_certificate){

foreach($request->file('birth_certificate') as $file){

    print_r($file); 
}
        $studnets->documents()->save(new Document([
         'students_id'=>$studnets->id,
         'type'=>'birth_certificate',
         'file_path'=>''
        ]));
       }
        return response()->json([
            "message" => "student registered successfully"
        ], 201);
    }catch (RequestException $ex) {
        return response()->json([
            "message" => "Bad request"
        ], 404);
    }    
    }
 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        if($student){
            $student->delete();
            return response()->json([
                "data" => $student,
                "message" => "Record found."
              ], 202);
        }
         return response()->json([
            "message"=>"No record found.",
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if($student){
        $validator = Validator::make($request->all() , [

            'first_name' => 'required|string',
            'last_name' => 'string',
            'mobile_number' => 'integer',
            'course' => 'required|string',
            'parent_name' => 'string',
            'standard' => 'string'
        ]);
        $input = $request->all();
        $student->update([
            'first_name'=> $input->first_name,
            'last_name' => $input->last_name,
            'mobile_number' => $input->mobile_number,
            'course' => $input->course,
            'parent_name' => $input->parent_name,
            'standard'=> $input->standard
        ]);
        $student->documents()->update([
            'type'=>'birth_certificate',
            'file_path'=>'ytyrytty'
           ]);
        return response()->json([
            "message" => "record updated"
          ], 202);
        }
        return response()->json([
            "message"=>"Failed to update",
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if($student){
            $student->delete();
            return response()->json([
                "message" => "record deleted"
              ], 202);
        }
         return response()->json([
            "message"=>"Failed to delete",
        ], 404);
    }
}
