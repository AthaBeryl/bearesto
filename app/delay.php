<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class delay extends Model
{
    protected $table = 'delay';
    protected $fillable = [
        'id','meja'
    ];
}
