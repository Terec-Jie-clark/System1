<?php

// Model deals with database
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model{

use HasFactory;
public $timestamps = false; 
protected $primaryKey = 'authorId'; 

// name of table

protected $table = 'author';

// column sa table
protected $fillable = [
'firstname', 'lastname', 'jobId'
];  
}