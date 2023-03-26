<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\CarbonInterval;

class Unloading extends Model
{
    use HasFactory;
    protected $table = 'unloading';
    protected $guarded = [];

    protected $appends = ['nama_customer', 'tanggal'];

    public function customer()
    {
        return $this->hasOne(Customer::class,  'id', 'customer_id');
    }

    public function muatan(): HasMany
    {
        return $this->hasMany(Muatan::class);
    }

    public function getnamaCustomerAttribute()
    {
        return $this->customer->nama;
    }

    public function getTanggalAttribute()
    {
        $date = Carbon::createFromFormat('Y-m-d', $this->tanggal_datang);
        setlocale(LC_TIME, 'id_ID.UTF-8');
        $formatted_date = $date->formatLocalized('%A, %d %B %Y');


        return $formatted_date;
    }
}
