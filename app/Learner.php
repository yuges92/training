<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Learner extends User
{

  protected $table = 'users';


  public static function allLearners(){
    return parent::all()->where('role','Learner');
  }

  public static function findLearner($id){
    return parent::find($id)->where('role','Learner');
  }


public function learner()
{
if ($this->role=='Learner') {
  return true;
}

return false;
}

}
