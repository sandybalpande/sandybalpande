<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
   protected $fillable=['name','email','mobile','address','salary'];
   protected $dates=['created_at','updated_at'];
}
