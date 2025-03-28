<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departments extends Model
{
    //
    use SoftDeletes;
    protected $table = 'departments';
    protected $fillable = ['name_department', 'description_department'];
}
