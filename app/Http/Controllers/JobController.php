<?php

namespace App\Http\Controllers;
use App\Models\JobType;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // <-- handling http request in lumen

Class JobController extends Controller {

 // use to add your Traits ApiResponser

 use ApiResponser;

 private $request;

 public function __construct(Request $request){
    $this->request = $request;
 }

 public function index(){

  $job = JobType::all();
  return $this->successResponse($job);

 }
//  show genre with specific id

 public function show($jobId){
  $job = JobType::findOrFail($jobId);
  return $this->successResponse($job);
 }
/*
public function addJob(Request $request){
   $rules = [
      'positionName' => 'required|max:150',
      'salary' => 'required|numeric',

   ];

   $this->validate($request, $rules);

   $job = JobType::create($request->all());
   return $this->successResponse($job, Response::HTTP_CREATED);
 }

 */

 
// -> can hold and add multiple value 
// -> and store to database 
public function addJob(Request $request)
{
    $rules = [
        '*.positionName' => ['required','max:150', Rule::unique('job_type', 'positionName ')],
        '*.salary' => 'required|numeric',
    ];

    $this->validate($request, $rules);

    $jobs = collect($request->all())->map(function ($item) {
        return JobType::create($item);
    });

    return $this->successResponse($jobs, Response::HTTP_ACCEPTED);
}

public function delete($id){
    $data = JobType::findOrFail($id);
    $data->delete();
    return $this->successResponse($data);
}

}
