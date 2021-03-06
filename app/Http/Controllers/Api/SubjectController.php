<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject = DB::table('subjects')->get();
        // dd($subject);
        return response()->json($subject);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $validator = Validator::make($request->all(),[
            'class_id' => 'required',
            'subject_name' => 'required|unique:subjects,subject_name|max:25',
            'subject_code' => 'required|unique:subjects,subject_code|max:25'
        ]);
        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray()
            ]);
        }

        $data = array();
        $data['class_id'] = $request->class_id;
        $data['subject_name'] = $request->subject_name;
        $data['subject_code'] = $request->subject_code;
        // $subject = Subject::create($request->all());
        // return response('Data Inserted Successfully');
        $insert = DB::table('subjects')->insert($data);
        return response('Data Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showData = DB::table('subjects')->where('id', $id)->first();
        if(!isset($showData)){
            return response('Data Not Exist!');
        }else{
            return response()->json($showData);
        }
        
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
        $validator = Validator::make($request->all(),[
            'class_id' => 'required',
            'subject_name' => 'required|unique:subjects,subject_name|max:25',
            'subject_code' => 'required|unique:subjects,subject_code|max:25'
        ]);
        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray()
            ]);
        }

        $data = array();
        $data['class_id'] = $request->class_id;
        $data['subject_name'] = $request->subject_name;
        $data['subject_code'] = $request->subject_code;
        $update = DB::table('subjects')->where('id', $id)->update($data);
        return response('Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = DB::table('subjects')->where('id', $id)->delete();
        return $subject->response('Data Deleted Successfully');
    }
}
