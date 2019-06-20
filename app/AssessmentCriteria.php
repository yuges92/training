<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssessmentCriteria extends Model
{
    protected $fillable=['course_id', 'number', 'description', 'createdBy', 'updatedBY'];


    public function course()
    {
      return $this->belongsTo(Course::class);
    }
}
