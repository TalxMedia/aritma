<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_person',
        'phone',
        'email',
        'tax_number',
        'tax_office',
        'address',
        'city_id',
        'district_id',
        'notes',
        'status',
    ];

    /**
     * Get the city that owns the supplier.
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get the district that owns the supplier.
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Get the invoices for the supplier.
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    /**
     * Get the expenses related to the supplier.
     */
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}