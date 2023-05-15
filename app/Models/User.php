<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','country','l_name','u_name','pp','fb','ytube','insta','linkd','vimeo','behance','flickr','web','twitter',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }


    public function listings(){
      return $this->hasMany('App\Models\Listings');
  }

    public function announcements(){
        return $this->hasMany('App\Models\Announcements');
    }


    public function bookmarks()
{
	return $this->hasMany(Favorite::class);
}
public function likes()
{
return $this->hasMany(Likes::class);
}



    public function roles()
    {
        return $this
            ->belongsToMany(Role::class)
            ->withTimestamps();
    }
    public function authorizeRoles($roles)
{
  if ($this->hasAnyRole($roles)) {
    return true;
  }
  abort(401, 'This action is unauthorized.');
}
public function hasAnyRole($roles)
{
  if (is_array($roles)) {
    foreach ($roles as $role) {
      if ($this->hasRole($role)) {
        return true;
      }
    }
  } else {
    if ($this->hasRole($roles)) {
      return true;
    }
  }
  return false;
}
public function hasRole($role)
{
  if ($this->roles()->where('name', $role)->first()) {
    return true;
  }
  return false;
}
}
