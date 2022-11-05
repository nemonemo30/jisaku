<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staffs';
    
    protected $fillable = [
        'name', 'hometown', 'league_id', 'comment', 'video',
    ];
    
    public function league () {
        return $this->belongsTo('App\League', 'league_id', 'id');
    }
}