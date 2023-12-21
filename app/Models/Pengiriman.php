<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;
    protected $table = 'pengiriman';
    protected $fillable = ['id','customer_id','unloading_id','proses_id','waktu_kirim','berat_kirim','jumlah_kirim'];

    public function customer()
    {
        return $this->hasOne(Customer::class,  'id', 'customer_id');
    }

    public function unloading()
    {
        return $this->hasOne(Unloading::class,  'id', 'unloading_id');
    }

    public function proses()
    {
        return $this->hasOne(Proses::class,  'id', 'proses_id');
    }

}
