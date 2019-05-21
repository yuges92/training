<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseDocument extends Model
{

    public $timestamps = true;
    private static $folder = 'course/documents/';
    protected $fillable=['course_id','title','filename','storedName'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public static function getFolderName()
    {
      return self::$folder;
    }
}
