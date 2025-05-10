<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class FilterChange extends Model
{
    // Tablo adınız zaten doğruysa bu satırı tutun:
    protected $table = 'filter_changes';

    // Timestamps kullanıyorsanız:
    public $timestamps = true;

    /**
     * Filtre değişikliğinin müşterisi
     */
    public function customer()
    {
        // filter_changes.filter_id → customers.id ilişkisi
        return $this->belongsTo(\App\Models\Customer::class, 'filter_id');
    }

    /**
     * Hangi tarih sütununu kullanacağımızı belirler.
     * Önem sırasına göre kontrol eder: change_date → next_change_date → created_at
     */
    public static function getDateColumn(): string
    {
        $candidates = ['change_date', 'next_change_date', 'created_at'];
        foreach ($candidates as $col) {
            if (Schema::hasColumn('filter_changes', $col)) {
                return $col;
            }
        }
        // Hiçbiri bulunamazsa created_at
        return 'created_at';
    }
}
