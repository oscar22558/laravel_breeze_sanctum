<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Teacher;
use App\People;
class Student extends Model
{
    //
    protected $fillable = [
        'teacher_id'
    ];

    
    function teachers(){
        return $this->belongsToMany(Teacher::class);
    }

    function people(){
        return $this->morphOne(People::class, "peopleable");
    }
}
