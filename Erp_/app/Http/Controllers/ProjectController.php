<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        //
        $project=project::all();
        return $project;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $status     =   200;

    public function createProject(Request $request)
    {
        $validator          =       Validator::make($request->all(),
        [   
            "project_name"        =>      "required",
            "description"         =>      "required"
            
        ]
    );

    // if validation fails
    if($validator->fails()) {
        return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
    }

    $project_id             =       $request->id;
     $projectArray           =       array(
        "project_name"            =>      $request->project_name,
        "description"             =>      $request->description
        
    );

    if($project_id !="") {           
        $project              =         project::find($project_id);
        if(!is_null($project)){
            // $updated_status     =       project::where("id", $project_id)->update($project_Array);
            // if($updated_status == 1) {
                // return response()->json(["status" => $this->status, "success" => true, "message" => "project detail updated successfully"]);
            // // }
            // // else {
                return response()->json(["status" => "failed", "message" => "Whoops! failed to update, try again."]);
            // }               
        }                   
    }

    else {
        $project        =       project::create($projectArray);
        if(!is_null($project)) {            
            return response()->json(["status" => $this->status, "success" => true, "message" => "project record created successfully", "data" => $project]);
        }    
        else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! failed to create."]);
        }
    }        
    }
//

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $data=$request->all();
        dd($request);
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
        //
    }
}
