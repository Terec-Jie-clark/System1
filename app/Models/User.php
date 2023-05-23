<?php

// Model deals with database
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class User extends Model{
public $timestamps = false; 
protected $primaryKey = 'authorId'; 

// name of table

protected $table = 'author';

// column sa table
protected $fillable = [
'firstname', 'lastname', 'genreId', 'jobId'
];  
}