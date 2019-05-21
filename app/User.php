<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
  use Notifiable, \Laravel\Passport\HasApiTokens;

  public $timestamps = true;


  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password',
  ];



  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];



  public function getFullname()
  {
    return ucfirst($this->firstName) . ' ' . ucfirst($this->lastName);
  }

  public function getInitials()
  {
    return ucfirst($this->firstName[0]) . '' . ucfirst($this->lastName[0]);
  }



  public function roles()
  {
    return $this->belongsToMany(Role::class)->withTimestamps();;
  }


  public function authorizeRoles($roles)
  {
    if (is_array($roles)) {
      return $this->hasAnyRole($roles) ||
        abort(401, 'This action is unauthorized.');
    }
    return $this->hasRole($roles) ||
      abort(401, 'This action is unauthorized.');
  }

  /**
   * Check multiple roles
   * @param array $roles
   */
  public function hasAnyRole($roles)
  {
    return null !== $this->roles()->whereIn('name', $roles)->first();
  }

  /**
   * Check one role
   * @param string $role
   */
  public function hasRole($role)
  {
    return null !== $this->roles()->where('name', $role)->first();
  }



  public function hasAdminAccess()
  {
    $allowedRoles = array('Super Admin', 'Admin', 'Manager', 'Trainer', 'Moderator', 'OCN');
    // if(in_array($this->role,$allowedRoles)){
    //   return true;
    // }
    //
    // return false;
    return null !== $this->roles()->where('name', $allowedRoles)->first();
  }




  //for class trainer
  public function trainingClasses()
  {
    return $this->belongsToMany('App\ClassEvent', 'classevent_trainer', 'user_id')->withPivot('createdBy');
  }


  //for class learnes
  public function learnerClasses()
  {
    return $this->belongsToMany('App\ClassEvent', 'class_students', 'user_id', 'class_id')->withPivot('attendance')->withTimestamps();
  }


  public function detail()
  {
    return $this->hasOne('App\UserDetail', 'user_id');
  }

  public function addresses()
  {
    return $this->hasMany('App\Address', 'user_id');
  }

  public function orders()
  {
    return $this->hasMany('App\Order', 'user_id');
  }

  public function getAddressByType($type)
  {
    return $this->addresses()->where('type', $type)->first();
  }

  public function gdpr()
  {
    return $this->hasOne('App\UserGdpr', 'user_id');
  }

  public function getAttendace($class_id)
  {
    return $this->learnerClasses->find($class_id)->pivot;
  }
}