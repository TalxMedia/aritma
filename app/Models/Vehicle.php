<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'plate_number',
        'brand',
        'model',
        'year',
        'user_id',
        'status',
        'notes',
    ];

    /**
     * Get the user that owns the vehicle.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the stocks for the vehicle.
     */
    public function stocks()
    {
        return $this->hasMany(VehicleStock::class);
    }

    /**
     * Get the installations for the vehicle.
     */
    public function installations()
    {
        return $this->hasMany(Installation::class);
    }

    /**
     * Get the expenses related to the vehicle.
     */
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}