<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassDate extends Model
{
    // protected $fillable=['class_id','day', 'date', 'startTime', 'endTime'];
    // protected $dates = ['date'];

    public function classEvent()
    {
        return $this->belongsTo(ClassEvent::class);
    }

    public function getFormattedDate()
    {
        $date = \Carbon\Carbon::parse(($this->date . '' . $this->startTime))->locale('uk');
        // dd($date->toRfc822String());

        return $date->format('l jS \\of F Y');
    }
}
