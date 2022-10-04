<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name', 'position_id', 'height', 'weight', 'age', 'sex_id', 'from', 'video', 'comment',
    ];

    public function position () { 
        return $this->belongsTo('App\Position', 'position_id', 'id');
    }

    public function sex () {
        return $this->belongsTo('App\Sex', 'sex_id', 'id');
    }
}
