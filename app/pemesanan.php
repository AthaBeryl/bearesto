<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    protected $table = 'pemesanan';
    protected $fillable = [
        'id','no_meja','menu','harga','jumlah','keterangan','status'
    ];
}
