<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenis extends Model
{
    protected $table = 'jenis';
    public $timestamps = false;
    protected $fillable = [
        'id','jenis'
    ];
}
