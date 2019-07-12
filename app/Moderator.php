<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moderator extends User
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
                $roles->where('name', 'Moderator');
            });
        });
    }
}
