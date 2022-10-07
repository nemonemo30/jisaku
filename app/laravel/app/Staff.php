<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staffs';
    
    protected $fillable = [
        'name', 'hometown', 'league', 'comment', 'del_flg',
    ];
    
    public function league () {
        return $this->belongsTo('App\League', 'league', 'id');
    }
}