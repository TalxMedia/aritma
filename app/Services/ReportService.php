<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\DailyReportNotification;
use Illuminate\Support\Facades\Notification;

class ReportService
{
    /**
     * Generate and send daily reports.
     */
    public function generateDailyReports()
    {
        // Spatie rol ilişkisini kullanan sorgu:
        $admins = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        foreach ($admins as $admin) {
            Notification::send($admin, new DailyReportNotification($admin));
        }
    }
}
