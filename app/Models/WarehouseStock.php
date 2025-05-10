<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'warehouse_id',
        'product_id',
        'quantity',
        'reserved_quantity',
    ];

    /**
     * Get the warehouse that owns the stock.
     */
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    /**
     * Get the product that owns the stock.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}