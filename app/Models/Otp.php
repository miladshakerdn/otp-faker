<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model 
{
    // table name
    protected $table = 'otp';
    protected $guarded = [];
    // auto incrementing id
    // public $incrementing = true;
    // handel exception if can't find any thing
    public $throwOnFind = true;
}
