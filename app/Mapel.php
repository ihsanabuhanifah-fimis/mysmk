<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    public function jadwal()
    {
    	return $this->hasOne('App\Jadwal');
    }
}
