<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TableNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_number',
    ];
    public function availabilities(): HasMany
    {
        return $this->hasMany(Table::class, 'table_id');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class, 'table_id');
    }
}