<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
       // Table name
       protected $table = 'newsletters';
       // primary key
       public $primaryKey = 'id';
       //timestamps
       public $timestamps = true;
}
