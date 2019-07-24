<?php

namespace App;

use App\Cart;
use App\ClassDate;

use App\Assignment;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassEvent extends Model

{
    public $timestamps = true;
    protected $dates = ['date', 'startDate', 'endDate'];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function address()
    {
        return $this->belongsTo('App\ClassAddress');
    }

    // public function cart()
    // {
    //     return $this->hasMany('App\Comment');
    // }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function getFormattedStartDate()
    {
        return $this->startDate->format('j F Y');
    }

    public function getStartEndDate()
    {
        return 1;
        return $this->startDate->format('j F Y') . ' - ' . $this->endDate->format('j F Y');
    }
    public function getFormattedStartDate2()
    {
        return $this->startDate->format('Y-m-d');
    }

    public function getFormattedEndDate2()
    {
        return $this->endDate->format('Y-m-d');
    }



    public function trainers()
    {
        return $this->belongsToMany(User::class, 'classEvent_trainer', 'class_id', 'user_id')->withPivot('createdBy', 'type')->withTimestamps();
    }

    public function learners()
    {
        return $this->belongsToMany(User::class, 'class_students', 'class_id', 'user_id')->withPivot('attendance')->withTimestamps();
    }

    public function classDates()
    {
        return $this->hasMany(ClassDate::class, 'class_id');
    }

    public function reduceSpace($space)
    {
        $this->availableSpace = $this->availableSpace - $space;
        $this->save();
    }

    public function deadline()
    {
        return $this->belongsToMany(Assignment::class, 'assignment_deadline', 'assignment_id', 'class_id')->withPivot('date')->withTimestamps();
    }

    public function getStartDate()
    {
        $this->load('classDates');
        $date = $this->classDates->where('day', 1)->first();
        // dump($date);
        if ($date == '') {
            return null;
        }

        $date = \Carbon\Carbon::parse(($date->date . '' . $date->startTime))->locale('uk');
        // dd($date->toRfc822String());

        return $date->format('l jS \\of F Y h:i A');
    }

    public function getAvailableSpaceText()
    {
        if ($this->availableSpace>4) {
            return '<span class="text-success"> Available </span>';
        }elseif ($this->availableSpace>0) {
            return '<span class="text-warning">   Limited space available </span>';
        }else {
            return '<span class="text-danger"> Fully booked</span>';
        }
    }

    public function isFullyBooked()
    {
        return $this->availableSpace>0;
    }
}
