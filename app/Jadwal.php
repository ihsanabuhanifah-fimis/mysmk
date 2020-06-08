<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    // public function cikgu()
    // {
    // 	return $this->hasOne('App\Cikgu');
    // }
    public function mapel()
    {
    	return $this->belongsTo('App\Mapel');
    }
}
