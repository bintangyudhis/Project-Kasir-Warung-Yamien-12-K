<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderItems extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'price',
        'subtotal',
        'order_id',
        'product_id',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'category_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getSubTotal()
    {
        return $this->quantity * $this->price;
    }
}
