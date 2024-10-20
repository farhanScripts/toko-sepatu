<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function orderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
    public function cartItem(): HasMany
    {
        return $this->hasMany(CartItems::class);
    }
    public function stock(): HasMany
    {
        return $this->hasMany(Stock::class);
    }
}
