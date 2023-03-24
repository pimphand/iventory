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

    public function muatan(): HasMany
    {
        return $this->hasMany(Muatan::class);
    }
}
