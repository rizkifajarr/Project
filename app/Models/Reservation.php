<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'table_id',
        'hour_id',
        // 'transaction_id',
        'name',
        'email',
        'phone',
        'reservation_date',
        'duration',
        'total_price',
        'status'
    ];
    public function table(): BelongsTo
    {
        return $this->belongsTo(TableNumber::class, 'table_id');
    }

    public function hour(): BelongsTo
    {
        return $this->belongsTo(Hour::class, 'hour_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
