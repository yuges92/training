<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseBody extends Model
{

    protected $fillable = ['title', 'content','order', 'createdBy'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
