<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hour extends Model
{
    use HasFactory;

    protected $fillable = [
        'hour'
    ];

    public function availabilities(): HasMany
    {
        return $this->hasMany(Table::class, 'hour_id');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class, 'hour_id');
    }
}
