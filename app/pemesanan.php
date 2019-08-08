<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    protected $table = 'pemesanan';
    protected $fillable = [
        'id','no_meja','id_menu','harga','jumlah','keterangan','status','id_delay','subtotal'
    ];
}
