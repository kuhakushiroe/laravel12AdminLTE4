<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    //
    protected $table = 'departments';
    protected $fillable = ['name_department', 'description_department'];
}
