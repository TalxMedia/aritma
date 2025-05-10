<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city_id',
        'district_id',
        'manager_name',
        'phone',
        'notes',
        'is_active',
    ];

    /**
     * Get the city that owns the warehouse.
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get the district that owns the warehouse.
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Get the stocks for the warehouse.
     */
    public function stocks()
    {
        return $this->hasMany(WarehouseStock::class);
    }
}