<?php

namespace App;

use App\Assignment;
use App\QuestionAnswer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Question extends Model
{
    private static $imageFolder = 'assignments/questions/'; 
    protected $fillable = ['assignment_id', 'type', 'number', 'description', 'image', 'video', 'createdBy', 'updatedBY'];

    public function assignment()
    {
        return  $this->belongsTo(Assignment::class)->withTimestamps();
    }

    public function answers()
    {
        return  $this->hasMany(QuestionAnswer::class)->withTimestamps();
    }

    public function criterias()
    {
        return  $this->belongsToMany('App\AssessmentCriteria', null, 'question_id', 'criteria_id')->withTimestamps();
        // return $this->belongsToMany(User::class, 'classEvent_trainer', 'class_id', 'user_id')->withPivot('createdBy', 'type')->withTimestamps();
    }

    public function getImageFolder()
    {
        return self::$imageFolder;
    }
  
    public function getImage()
    {
        // \Debugbar::error($this->image);
        if ($this->image == null) {
            return null;
        }
        return Storage::url($this->getImageFolder() . $this->image);
    }
}
