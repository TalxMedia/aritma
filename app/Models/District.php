<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'name',
        'code',
    ];

    /**
     * Get the city that owns the district.
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get the customers for the district.
     */
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    /**
     * Get the suppliers for the district.
     */
    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }

    /**
     * Get the warehouses for the district.
     */
    public function warehouses()
    {
        return $this->hasMany(Warehouse::class);
    }
}