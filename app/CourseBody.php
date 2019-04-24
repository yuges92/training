<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseBody extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
