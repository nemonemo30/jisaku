<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function league () {
        return $this->belongsTo('App\league', 'league', 'id');
    }
}
