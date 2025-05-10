<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Customer;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\FilterReminderNotification;

class RemindersFilter extends Command
{
    protected $signature = 'reminders:filter';
    protected $description = 'Send filter replacement reminders to customers';

    public function handle()
    {
        $this->info('🌟 Filter reminder task started.');

        $dueDate = Carbon::now()->subMonths(6);
        $customers = Customer::where('last_filter_change', '<=', $dueDate)->get();

        foreach ($customers as $customer) {
            Notification::send($customer, new FilterReminderNotification($customer));
        }

        $this->info('✅ Reminders sent to '.$customers->count().' customers.');
    }
}
