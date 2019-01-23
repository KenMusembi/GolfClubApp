<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Clubs extends Model
{
    //
    protected $fillable = [
        'id', 'club_name', 'description',
    ];
}
