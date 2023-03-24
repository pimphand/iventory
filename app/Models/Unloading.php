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

    public function customer()
    {
        return $this->hasOne(Customer::class,  'id', 'customer_id');
    }

    public function getWaktuDatangAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }
    public function getWaktuBongkarAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }
    public function getWaktuSelesaiAttribute($value)
    {
        $duration = CarbonInterval::minutes($value);
        $waktu_selesai = $duration->cascade()->format('%hh %im');

        $waktu_selesai = str_replace(['h', 'm'], [' JAM ', ' MENIT '], $waktu_selesai);
        $waktu_selesai = str_replace(' ', ' ', $waktu_selesai);

        return $waktu_selesai;
    }

    public function muatan(): HasMany
    {
        return $this->hasMany(Muatan::class);
    }
}
