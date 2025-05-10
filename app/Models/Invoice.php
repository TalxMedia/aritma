<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'type',
        'customer_id',
        'supplier_id',
        'issue_date',
        'due_date',
        'subtotal',
        'tax_amount',
        'total_amount',
        'is_tax_included',
        'status',
        'notes',
        'created_by',
    ];

    protected $casts = [
        'issue_date' => 'date',
        'due_date' => 'date',
        'is_tax_included' => 'boolean',
    ];

    /**
     * Get the customer that owns the invoice.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the supplier that owns the invoice.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Get the user that created the invoice.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the invoice items for the invoice.
     */
    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}