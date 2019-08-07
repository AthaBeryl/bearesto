<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class meja extends Model
{
    protected $table = 'meja';
    public $timestamps = false;
    protected $fillable = [
        'id','meja','status'
    ];
}
