<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssessmentCriteria extends Model
{
    protected $fillable=['id','course_id', 'number', 'description', 'createdBy', 'updatedBY'];


    public function course()
    {
      return $this->belongsTo(Course::class);
    }

    public function questions()
    {
      return $this->belongsToMany(Question::class,null,'criteria_id', 'question_id');
    }
}
