<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'category_id',
        'description',
        'purchase_price',
        'sale_price',
        'minimum_stock_level',
        'image',
        'brand',
        'model',
        'is_filter',
        'filter_change_period',
        'is_active',
    ];

    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the warehouse stocks for the product.
     */
    public function warehouseStocks()
    {
        return $this->hasMany(WarehouseStock::class);
    }

    /**
     * Get the vehicle stocks for the product.
     */
    public function vehicleStocks()
    {
        return $this->hasMany(VehicleStock::class);
    }

    /**
     * Get the filters for the product.
     */
    public function filters()
    {
        return $this->hasMany(Filter::class);
    }

    /**
     * Get the invoice items for the product.
     */
    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}