<?php

//  <-- CONTROLLER - THE MIDDLE MAN

namespace App\Http\Controllers;
use App\Models\JobType;
use Illuminate\Http\Response;
use App\Models\User; // <-- The model
use Illuminate\Http\Request; // <-- handling http request in lumen
use App\Traits\ApiResponser; // <-- use to standardized our code for api response

// use DB;  // <---if you're not using lumen eloquent you can use DB component in lumen

class UserController extends Controller
{
    use ApiResponser;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
// GET

    public function getAllData()
    {
        // eloquent style
        $users = User::all();

        // sql string as parameter (if nag use og DB)
        // $user = DB::connection('mysql')
        // ->select("Select * from tbluser");
        // return response()->json($users, 200); // <-- before
        return $this->successResponse($users);
    }

// GET (ID)
public function showId($id)
{ 
    return User::where('authorId', $id)->get();

}

// ADD
public function add(Request $request)
{
    
    $rules = [
    'firstname' => 'required|max:20',
    'lastname' => 'required|max:20',
    'jobId' => 'required|numeric|min:1|not_in:0',
    ];

    $this->validate($request, $rules);
    // validate if jobId is found in the table jobtype

    $authorJob = JobType::findOrFail($request->jobId);

    /*
    --> use array to post 

    $author = collect($request->all())->map(function ($item){
        return User::create($item);
    });

    */
    // post single data using body / params
    $author = User::create($request->all());
  
    return $this->successResponse($author, Response::HTTP_CREATED);
    
    
    
}

// UPDATE
public function update(Request $request, $id)
{
    $rules = [
      'firstname' => 'required|max:20',
      'lastname' => 'required|max:20',
      'jobId' => 'required|numeric|min:1|not_in:0',
    ];

    $this->validate($request, $rules);
    $authorAward = JobType::findOrFail($request->jobId);
    $user = User::findOrFail($id);
    $user->fill($request->all());
    $user->save();

    return $user;
}

// DELETE

public function delete($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return $this->successResponse($user);
}

    // Index

public function index()
    {
        $users = User::all();
        return $this->successResponse($users);
    }
}
