<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;

class SclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sclass = DB::table('sclasses')->get();
        // dd($sclass);
        return response()->json($sclass);
        // return $sclass->toArray();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return response()->json($request->all());
        // $validatedData = $request->validate([
        //     'class_name' => ['required|unique:sclasses,class_name|max:255'],
        // ]);
        $validator = Validator::make($request->all(),[
            'class_name' => 'required|unique:sclasses,class_name|max:25',
        ]);
        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray()
            ]);
        }

        $data = array();
        $data['class_name'] = $request->class_name;
        $insert = DB::table('sclasses')->insert($data);
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
        $showData = DB::table('sclasses')->where('id', $id)->first();
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
            'class_name' => 'required|unique:sclasses,class_name|max:25',
        ]);
        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray()
            ]);
       }

        $data = array();
        $data['class_name'] = $request->class_name;
        $update = DB::table('sclasses')->where('id', $id)->update($data);
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
       $sclass = DB::table('sclasses')->where('id', $id)->delete();
       return $sclass->response('Data Deleted Successfully');
    }


}
