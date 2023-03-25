<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proses extends Model
{
    use HasFactory;
    protected $table = 'proses';
    protected $fillable = ['id','customer_id','unloading_id','waktu_mulai','waktu_selesai','tipe_produk','grade','berat_produk','jumlah_produk','randemen','berat_gagal','jumlah_gagal'];
}
