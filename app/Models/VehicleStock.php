<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'product_id',
        'quantity',
        'loading_date',
        'loaded_by',
    ];

    /**
     * Get the vehicle that owns the stock.
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    /**
     * Get the product that owns the stock.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the user that loaded the stock.
     */
    public function loadedBy()
    {
        return $this->belongsTo(User::class, 'loaded_by');
    }
}