<?php

namespace App;

use App\ClassEvent;
use Illuminate\Database\Eloquent\Model;

class Trainer extends User
{
    protected $table = 'users';


        /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->whereHas('roles', function ($roles){
                $roles->where('name', 'Trainer');
            });        
        });
    }


      //for class trainer
  public function classes()
  {
    return $this->belongsToMany(ClassEvent::class, 'classEvent_trainer', 'user_id', 'class_id')->withPivot('createdBy', 'type')->withTimestamps();

  }

}
