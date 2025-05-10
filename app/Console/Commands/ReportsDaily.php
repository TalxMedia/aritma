<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ReportService;

class ReportsDaily extends Command
{
    protected $signature = 'reports:daily';
    protected $description = 'Generate and email daily system reports';

    public function handle()
    {
        $this->info('☀️ Daily report task started.');

        // Rapor servisimizi çağırıyoruz (sonraki adımda oluşturacağız)
        $reportService = app(ReportService::class);
        $reportService->generateDailyReports();

        $this->info('✅ Daily reports generated and sent.');
    }
}
