{{-- resources/views/dashboard/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    {{-- 1) Başlık ve araç çubuğu --}}
    <div class="dashboard-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button class="btn btn-sm btn-outline-secondary">Paylaş</button>
                <button class="btn btn-sm btn-outline-secondary">Dışa Aktar</button>
            </div>
            <div class="dropdown">
                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-calendar"></i> Bu Hafta
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Bu Hafta</a></li>
                    <li><a class="dropdown-item" href="#">Bu Ay</a></li>
                    <li><a class="dropdown-item" href="#">Son 3 Ay</a></li>
                </ul>
            </div>
        </div>
    </div>

    {{-- 2) İstatistik kartları --}}
    <div class="row mb-4">
        @foreach ([
            ['bg'=>'primary','title'=>'Toplam Montaj','value'=>$stats['installations_count'],'icon'=>'tools'],
            ['bg'=>'success','title'=>'Toplam Cihaz','value'=>$stats['devices_count'],'icon'=>'box'],
            ['bg'=>'warning','title'=>'Bekleyen Filtre','value'=>$stats['pending_filters'],'icon'=>'filter'],
            ['bg'=>'danger','title'=>'Aylık Gelir','value'=>'₺'.number_format($stats['monthly_income'],0),'icon'=>'lira-sign'],
        ] as $card)
        <div class="col-md-3 mb-4">
            <div class="card bg-{{ $card['bg'] }} text-white h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase">{{ $card['title'] }}</h6>
                        <h1 class="display-4">{{ $card['value'] }}</h1>
                    </div>
                    <i class="fas fa-{{ $card['icon'] }} fa-3x"></i>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="#" class="text-white text-decoration-none">Detaylı Görüntüle</a>
                    <i class="fas fa-angle-right"></i>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- 3) Grafikler --}}
    <div class="row mb-4">
        <div class="col-md-8 mb-4">
            <div class="card panel h-100">
                <div class="card-header"><i class="fas fa-chart-line me-1"></i> Gelir-Gider (6 Ay)</div>
                <div class="card-body"><canvas id="incomeExpenseChart" height="40"></canvas></div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card panel h-100">
                <div class="card-header"><i class="fas fa-chart-pie me-1"></i> Montaj Durumu</div>
                <div class="card-body"><canvas id="installationStatusChart" height="50"></canvas></div>
            </div>
        </div>
    </div>

    {{-- 4) Ayın Personelleri & Hızlı Montaj --}}
    <div class="row mb-4">
        <div class="col-md-6 mb-4">
            <div class="card panel">
                <div class="card-header"><i class="fas fa-award me-1"></i> Ayın Personelleri</div>
                <div class="card-body">
                    <div class="row">
                        @foreach($topEmployees as $key => $item)
                            <div class="col-md-4 text-center mb-3">
                                <div class="card bg-light h-100">
                                    <div class="card-body">
                                        <i class="fas fa-trophy fa-3x text-warning mb-2"></i>
                                        <h5>{{ $item['label'] }}</h5>
                                        <img src="{{ $item['image'] }}" class="rounded-circle mb-2" width="64">
                                        <h6>{{ $item['name'] }}</h6>
                                        <p class="text-muted small mb-0">{{ $item['count'] }} {{ $item['unit'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card panel">
                <div class="card-header"><i class="fas fa-plus me-1"></i> Hızlı Montaj Ekle</div>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Müşteri</label>
                                <select class="form-select" required>
                                    <option disabled selected>Seçin</option>
                                    @foreach($customers as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Teknisyen</label>
                                <select class="form-select" required>
                                    <option disabled selected>Seçin</option>
                                    @foreach($technicians as $t)
                                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-danger">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- 5) Yaklaşan Filtre Değişimleri --}}
    <div class="row">
        <div class="col-12">
            <div class="card panel">
                <div class="card-header"><i class="fas fa-calendar-alt me-1"></i> Yaklaşan Filtre Değişimleri</div>
                <div class="card-body">
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Müşteri</th>
                                <th>Tarih</th>
                                <th>Notlar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($upcomingFilterChanges as $fc)
                                <tr>
                                    <td>{{ $fc->customer->name }}</td>
                                    <td>{{ $fc->next_change_date ?? $fc->change_date }}</td>
                                    <td>{{ Str::limit($fc->notes, 30) }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="text-center">Kayıt yok</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Chart.js script’leri --}}
@section('scripts')
<script>
    const months = @json($months);
    const income = @json($income);
    const expenses = @json($expenses);
    const instStats = @json($installationStats);

    // Gelir-Gider
    new Chart(document.getElementById('incomeExpenseChart'), {
        type: 'line',
        data: {
            labels: months,
            datasets: [
                { label:'Gelir',   data: income,   backgroundColor:'rgba(40,167,69,0.2)', borderColor:'rgba(40,167,69,1)', borderWidth:2, tension:0.4 },
                { label:'Gider',   data: expenses, backgroundColor:'rgba(220,53,69,0.2)',borderColor:'rgba(220,53,69,1)',borderWidth:2, tension:0.4 }
            ]
        },
        options:{ responsive:true, maintainAspectRatio:false }
    });

    // Montaj Durumu
    new Chart(document.getElementById('installationStatusChart'), {
        type: 'doughnut',
        data: {
            labels:['Tamamlandı','Beklemede','İptal','Deneme'],
            datasets:[{
                data:[
                    instStats.completed,
                    instStats.pending,
                    instStats.cancelled,
                    instStats.on_trial
                ],
                backgroundColor:['rgba(40,167,69,0.7)','rgba(255,193,7,0.7)','rgba(220,53,69,0.7)','rgba(13,110,253,0.7)'],
                borderColor:['rgba(40,167,69,1)','rgba(255,193,7,1)','rgba(220,53,69,1)','rgba(13,110,253,1)'],
                borderWidth:1
            }]
        },
        options:{ responsive:true, maintainAspectRatio:false, plugins:{ legend:{ position:'bottom' } } }
    });
</script>
@endsection
