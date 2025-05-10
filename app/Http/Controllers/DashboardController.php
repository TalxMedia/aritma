<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Customer;
use App\Models\Installation;
use App\Models\Product;       // “Cihaz” sayısı için
use App\Models\FilterChange;  // “Filtre değişimi” tablosu
use App\Models\Invoice;       // Fatura tablosu
use App\Models\User;          // Teknisyen listesi için
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // ————————————
        // 1) İSTATİSTİKLER
        // ————————————
        // “device” = Ürün sayısı:
        $devicesCount = Product::count();

        // “installation” sayısı:
        $installationsCount = Installation::count();

        // “pending_filters” = tüm filter_changes kaydı sayısı:
        $pendingFilters = FilterChange::count();

        // “monthly_income” = bu ay verilen faturaların toplamı (total_amount sütunu)
        $monthlyIncome = Invoice::whereMonth('created_at', now()->month)
                                ->sum('total_amount');

        $stats = [
            'installations_count' => $installationsCount,
            'devices_count'       => $devicesCount,
            'pending_filters'     => $pendingFilters,
            'monthly_income'      => $monthlyIncome,
        ];

        // ————————————
        // 2) GRAFİK VERİLERİ (örnek sabit)
        // ————————————
        $months   = ['Oca','Şub','Mar','Nis','May','Haz'];
        $income   = [1200,1500,900,2000,1800,2200];
        $expenses = [ 800, 700,950,1200,1100,1300];

        $installationStats = [
            'completed'   => Installation::where('status','completed')->count(),
            'pending'     => Installation::where('status','pending')->count(),
            'cancelled'   => Installation::where('status','cancelled')->count(),
            'on_trial'    => Installation::where('status','on_trial')->count(),
        ];

        // ————————————
        // 3) AYIN PERSONELLERİ (ÖRNEK SABİT)
        // ————————————
        $topEmployees = [
            'sales'         => ['label'=>'Satış','name'=>'Ali','count'=>10,'unit'=>'Cihaz','image'=>'/images/avatar1.jpg'],
            'installations' => ['label'=>'Montaj','name'=>'Veli','count'=>8,'unit'=>'Montaj','image'=>'/images/avatar2.jpg'],
            'filters'       => ['label'=>'Filtre','name'=>'Ayşe','count'=>5,'unit'=>'Filtre','image'=>'/images/avatar3.jpg'],
        ];

        // ————————————
        // 4) FORM DROPDOWN’LARI
        // ————————————
        $customers   = Customer::select('id','name')->get();
        // “Teknisyenler” için burada User modelini kullandık:
        $technicians = User::select('id','name')->get();

        // ————————————
        // 5) YAKLAŞAN FİLTRE DEĞİŞİMLERİ
        // ————————————
        // Hangi tarih sütununu kullanacağımızı modele sorduk:
        $dateCol = FilterChange::getDateColumn();

        $upcomingFilterChanges = FilterChange::with('customer')
            ->whereBetween($dateCol, [now(), now()->addDays(3)])
            ->get();

        // ————————————
        // VIEW’A VERİLERİ YOLLA
        // ————————————
        return view('dashboard.index', compact(
            'stats',
            'months','income','expenses',
            'installationStats','topEmployees',
            'customers','technicians','upcomingFilterChanges'
        ));
    }
}
