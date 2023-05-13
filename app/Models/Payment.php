<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   
      // Table name
      protected $table = 'payments';
      // primary key
      public $primaryKey = 'id';
      //timestamps
      public $timestamps = true;
}
