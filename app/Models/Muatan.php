<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muatan extends Model
{
    use HasFactory;

    protected $guarded = [];

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
}
