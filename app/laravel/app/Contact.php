<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'recruit_id', 'comment',
    ];

    public function recruit() {
        return $this->belongsTo('App\Recruit', 'recruit_id', 'id');
    }

    
}
