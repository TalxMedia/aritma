<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];

    /**
     * Get the districts for the city.
     */
    public function districts()
    {
        return $this->hasMany(District::class);
    }

    /**
     * Get the customers for the city.
     */
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    /**
     * Get the suppliers for the city.
     */
    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }

    /**
     * Get the warehouses for the city.
     */
    public function warehouses()
    {
        return $this->hasMany(Warehouse::class);
    }
}