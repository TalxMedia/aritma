<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installation extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'assigned_user_id',
        'vehicle_id',
        'type',
        'status',
        'scheduled_at',
        'completed_at',
        'trial_end_date',
        'notes',
        'completion_notes',
        'customer_signature',
        'created_by',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'completed_at' => 'datetime',
        'trial_end_date' => 'date',
    ];

    /**
     * Get the customer that owns the installation.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the user that is assigned to the installation.
     */
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }

    /**
     * Get the vehicle for the installation.
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    /**
     * Get the user that created the installation.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the filters for the installation.
     */
    public function filters()
    {
        return $this->hasMany(Filter::class);
    }

    /**
     * Get the filter changes for the installation.
     */
    public function filterChanges()
    {
        return $this->hasMany(FilterChange::class);
    }
}