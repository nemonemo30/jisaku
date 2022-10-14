<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recruit extends Model
{
    protected $fillable = [
        'position_id', 'sex_id', 'active', 'comment',
    ];

    public function position () { 
        return $this->belongsTo('App\Position', 'position_id', 'id');
    }

    public function sex () {
        return $this->belongsTo('App\Sex', 'sex_id', 'id');
    }

    public function contact () {
        return $this->hasMany('App\Contact', 'id', 'recruit_id');
    }

}
