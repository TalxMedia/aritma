<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'amount',
        'date',
        'user_id',
        'vehicle_id',
        'supplier_id',
        'created_by',
        'receipt_image',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    /**
     * Get the user related to the expense.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the vehicle related to the expense.
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    /**
     * Get the supplier related to the expense.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Get the user that created the expense.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}