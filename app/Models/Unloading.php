<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Unloading extends Model
{
    use HasFactory;
    protected $table = 'unloading';
    protected $fillable = ['id', 'customer_id','waktu_datang','waktu_bongkar','berat_do','berat_ayam_do','beban_timbangan','jumlah_diterima',
    'berat_mati','jumlah_mati','berat_ditolak','jumlah_ditolak','berat_keranjang','berat_ratarata'];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'id', 'customer_id');
    }
}
