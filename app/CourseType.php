<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
