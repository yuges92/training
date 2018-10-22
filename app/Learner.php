<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;

class Learner extends User
{
  public $timestamps = true;

  protected $table = 'users';

  // public static function boot()
  //   {
  //       parent::boot();
  //
  //       static::addGlobalScope(function ($query) {
  //         dd($query);
  //           $query->where('is_admin', true);
  //       });
  //   }

  public static function allLearners(){
    return Role::where('name','Learner')->first()->users;
  }

  public static function findLearner($id){
    return Role::where('name','Learner')->first()->users->find($id);
  }


  public static function all($columns='')
  {
    // dd(parent::all());
    if($columns==''){

      return Role::where('name','Learner')->first()->users;
    }
    return parent::all($columns);

  }


}
