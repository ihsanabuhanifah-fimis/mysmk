<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload_file extends Model
{
    
    public $timestamps = false;
    protected $fillable = ['id_cikgu', 'gambar'];
}
