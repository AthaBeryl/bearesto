<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $table = 'menu';
    public $timestamps = false;
    protected $fillable = [
        'id','menu','harga','deskripsi','gambar','jenis'
    ];
}
