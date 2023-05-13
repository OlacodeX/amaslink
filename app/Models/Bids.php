<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bids extends Model
{
   
      // Table name
      protected $table = 'bids';
      // primary key
      public $primaryKey = 'id';
      //timestamps
      public $timestamps = true;
      public function bidder()
      {
          return $this->belongsTo(User::class, 'bidder_id', 'id');
      }
}
