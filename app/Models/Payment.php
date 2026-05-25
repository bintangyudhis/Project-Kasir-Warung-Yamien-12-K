<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'payment_method',
        'status',
        'transaction_id',
        'payment_date',
        'order_id',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public static function generateTransactionId()
    {
        $prefix = 'TRX-' . date('Ymd');

        do{
            $id = $prefix . '-' . mt_rand(1000, 9999);
        
        }while (self::where('transaction_id', $id)->exists());

        return $id;
    } 
}
