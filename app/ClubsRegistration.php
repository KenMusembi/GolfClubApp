<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class ClubsRegistration extends Model
{
    //
    protected $fillable = [
        'id','user_id', 'club_id',
    ];

    public function uers()
    {
      return $this->hasOne('App\Project','user_id');
    }
}
