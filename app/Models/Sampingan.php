<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampingan extends Model
{
    use HasFactory;
    protected $table = 'sampingan';
    protected $fillable = [
        'id', 'customer_id', 'unloading_id', 'proses_id', 'berat_kepala_leher', 'prosentase_kepala_leher', 'berat_kepala_tanpa_leher', 'prosentase_kepala_tanpa_leher',
        'berat_usus', 'prosentase_usus', 'berat_hja', 'prosentase_hja', 'berat_ceker', 'prosentase_ceker', 'berat_tembolok', 'prosentase_tembolok'
    ];
}
