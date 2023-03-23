<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;
    protected $table = 'pengirim';
    protected $fillable = ['id','customer_id','unloading_id','proses_id','waktu_kirim','berat_kirim','jumlah_kirim'];
}
