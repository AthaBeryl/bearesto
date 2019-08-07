<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [
        'menu','harga','jumlah','subtotal','id'
    ];
}
