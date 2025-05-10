<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'identity_number',
        'address',
        'city_id',
        'district_id',
        'notes',
        'status',
    ];

    /**
     * Get the city that owns the customer.
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get the district that owns the customer.
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Get the installations for the customer.
     */
    public function installations()
    {
        return $this->hasMany(Installation::class);
    }

    /**
     * Get the filters for the customer.
     */
    public function filters()
    {
        return $this->hasMany(Filter::class);
    }

    /**
     * Get the invoices for the customer.
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}