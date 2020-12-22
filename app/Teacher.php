<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;
use App\People;

class Teacher extends Model
{
    //

    function students(){
        return $this->belongsToMany(Student::class);
    }

    function people(){
        return $this->morphOne(People::class, "peopleable");
    }
}
