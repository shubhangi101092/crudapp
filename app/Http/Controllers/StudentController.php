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
        // print_r($request->file('others')); exit;
         print_r($request->others); exit;
        //  $files = $request->file('others');
        // print_r($files); exit;
// foreach ($files as $one) {
//  echo  $filename = $one->getClientOriginalName(); exit;
//    $listfilenames[] = $filename;
//                 }
// print_r($listfilenames); exit;
       $studnets= Student::create($request->all());
       
        $studnets->documents()->save(new Document([
         'students_id'=>$studnets->id,
         'type'=>'birth_certificate',
         'file_path'=>'dkmsfd'
        ]));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // if(Student::where('id', $id)->exists()) {
        $student = Student::find($id);
        //$student->delete();

        return response()->json([
          "message" => "records deleted"
        ], 202);
    //   } else {
    //     return response()->json([
    //       "message" => "Student not found"
    //     ], 404);
    //   }
    }
}
