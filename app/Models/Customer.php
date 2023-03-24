<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = ['id', 'nama', 'email', 'telepon', 'alamat'];

    public function unloading(): HasMany
    {
        return $this->hasMany(Customer::class);
    }
}
