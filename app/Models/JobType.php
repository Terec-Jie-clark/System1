<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model{

  use HasFactory;
  public $timestamps = false; 
  protected $primaryKey = 'jobId'; 

  // name of table

  protected $table = 'job_type';

// table column
  protected $fillable = [
'positionName','salary'
  ]; 
}

