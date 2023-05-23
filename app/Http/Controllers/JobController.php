<?php

namespace App\Http\Controllers;
use App\Models\JobType;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
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

}
