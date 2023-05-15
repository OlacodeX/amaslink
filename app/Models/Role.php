<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
      // Table name
      protected $table = 'roles';
      // primary key
      public $primaryKey = 'id';
      //timestamps
      public $timestamps = true;
    public function users()
    {
        return $this
            ->belongsToMany('App\Models\User')
            ->withTimestamps();
    }
}
