<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassDate extends Model
{
    // protected $fillable=['class_id','day', 'date', 'startTime', 'endTime'];

    public function classEvent()
    {
        return $this->belongsTo(ClassEvent::class);
    }
}
