<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CourseType extends Model
{

    private $imageFolder = 'course/type/';
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function getImageFolder()
    {
        return $this->imageFolder;
    }

    public function getImage()
    {
        // \Debugbar::error($this->image);
        if ($this->image == null) {
            return Storage::url('no-image.jpg');
        }
        return Storage::url($this->getImageFolder() . $this->image);
    }


    public static function getNavMenu()
    {
        return self::with(['courses' => function ($query) {
            $query->where('status', 'publish')->where('enable_megamenu', 1)->orderBy('position');
        }])->where('status', 'publish')->where('enable_megamenu', 1)->orderBy('position')->get();
    }
}