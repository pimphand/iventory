<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Proses extends Model
{
    use HasFactory;
    protected $table = 'proses';
    protected $fillable = ['id', 'customer_id', 'unloading_id', 'waktu_mulai', 'waktu_selesai', 'berat_produk', 'tipe_produk', 'grade', 'berat_produk', 'jumlah_produk', 'randemen', 'berat_gagal', 'jumlah_gagal'];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function getWaktuSelesaiAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }
    public function getWaktuMulaiAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }
}
