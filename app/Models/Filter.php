<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_id',
        'serial_number',
        'installation_date',
        'next_change_date',
        'installation_id',
        'is_active',
        'notes',
    ];

    protected $casts = [
        'installation_date' => 'date',
        'next_change_date' => 'date',
    ];

    /**
     * Get the customer that owns the filter.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the product that owns the filter.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the installation that owns the filter.
     */
    public function installation()
    {
        return $this->belongsTo(Installation::class);
    }

    /**
     * Get the filter changes for the filter.
     */
    public function changes()
    {
        return $this->hasMany(FilterChange::class);
    }
}