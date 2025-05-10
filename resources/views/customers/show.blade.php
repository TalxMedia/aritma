<!-- resources/views/customers/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Müşteri Detayları</h1>
        <div>
            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-primary btn-icon-split me-2">
                <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                </span>
                <span class="text">Düzenle</span>
            </a>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Geri Dön</span>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background-color: #FAF0F0;">
                    <h6 class="m-0 font-weight-bold" style="color: #8B0000;">Müşteri Bilgileri</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">İşlemler:</div>
                            <a class="dropdown-item" href="{{ route('customers.edit', $customer) }}">
                                <i class="fas fa-edit fa-sm fa-fw me-2 text-gray-400"></i>Düzenle
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="fas fa-trash fa-sm fa-fw me-2 text-gray-400"></i>Sil
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="rounded-circle bg-primary text-white d-inline-flex justify-content-center align-items-center" style="width: 100px; height: 100px; background: linear-gradient(135deg, #8B0000, #E32636);">
                            <span style="font-size: 36px;">{{ strtoupper(substr($customer->name, 0, 2)) }}</span>
                        </div>
                        <h4 class="mt-3">{{ $customer->name }}</h4>
                        <div class="d-flex justify-content-center">
                            <span class="badge {{ $customer->status == 'active' ? 'bg-success' : 'bg-danger' }} p-2">
                                {{ $customer->status == 'active' ? 'Aktif' : 'Pasif' }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="mb-3 d-flex justify-content-center">
                        <a href="tel:{{ $customer->phone }}" class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="tooltip" title="Ara">
                            <i class="fas fa-phone"></i>
                        </a>
                        @if($customer->email)
                        <a href="mailto:{{ $customer->email }}" class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="tooltip" title="E-posta Gönder">
                            <i class="fas fa-envelope"></i>
                        </a>
                        @endif
                        <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="Konum">
                            <i class="fas fa-map-marker-alt"></i>
                        </a>
                    </div>
                    
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-phone fa-fw text-primary me-2"></i> Telefon</span>
                            <span class="text-gray-800">{{ $customer->phone }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-envelope fa-fw text-primary me-2"></i> E-posta</span>
                            <span class="text-gray-800">{{ $customer->email ?? '-' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-id-card fa-fw text-primary me-2"></i> TC/Vergi No</span>
                            <span class="text-gray-800">{{ $customer->identity_number ?? '-' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-map-marker-alt fa-fw text-primary me-2"></i> İl/İlçe</span>
                            <span class="text-gray-800">
                                @if ($customer->city)
                                    {{ $customer->city->name }} / {{ $customer->district->name ?? '' }}
                                @else
                                    -
                                @endif
                            </span>
                        </li>
                        <li class="list-group-item">
                            <div><i class="fas fa-home fa-fw text-primary me-2"></i> Adres</div>
                            <div class="mt-2 text-gray-800">{{ $customer->address ?? '-' }}</div>
                        </li>
                        <li class="list-group-item">
                            <div><i class="fas fa-sticky-note fa-fw text-primary me-2"></i> Notlar</div>
                            <div class="mt-2 text-gray-800">{{ $customer->notes ?? '-' }}</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-xl-8 col-lg-7">
            <!-- Montaj ve Filtre Geçmişi -->
            <div class="card shadow mb-4">
                <div class="card-header py-3" style="background-color: #FAF0F0;">
                    <ul class="nav nav-tabs card-header-tabs" id="customerTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="installations-tab" data-bs-toggle="tab" data-bs-target="#installations" type="button" role="tab" aria-controls="installations" aria-selected="true">
                                <i class="fas fa-tools fa-fw me-1"></i> Montajlar
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="filters-tab" data-bs-toggle="tab" data-bs-target="#filters" type="button" role="tab" aria-controls="filters" aria-selected="false">
                                <i class="fas fa-filter fa-fw me-1"></i> Filtreler
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="invoices-tab" data-bs-toggle="tab" data-bs-target="#invoices" type="button" role="tab" aria-controls="invoices" aria-selected="false">
                                <i class="fas fa-file-invoice-dollar fa-fw me-1"></i> Faturalar
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="customerTabContent">
                        <!-- Montajlar -->
                        <div class="tab-pane fade show active" id="installations" role="tabpanel" aria-labelledby="installations-tab">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="text-primary">Montaj Geçmişi</h6>
                                <a href="#" class="btn btn-sm btn-danger">
                                    <i class="fas fa-plus fa-sm"></i> Yeni Montaj Ekle
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Tarih</th>
                                            <th>Tip</th>
                                            <th>Durum</th>
                                            <th>Teknisyen</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Eğer montaj verileri varsa burada listelenecek -->
                                        <tr>
                                            <td colspan="6" class="text-center">Montaj kaydı bulunamadı.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Filtreler -->
                        <div class="tab-pane fade" id="filters" role="tabpanel" aria-labelledby="filters-tab">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="text-primary">Filtre Geçmişi</h6>
                                <a href="#" class="btn btn-sm btn-danger">
                                    <i class="fas fa-plus fa-sm"></i> Yeni Filtre Ekle
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Filtre Tipi</th>
                                            <th>Kurulum Tarihi</th>
                                            <th>Son Değişim</th>
                                            <th>Durumu</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Eğer filtre verileri varsa burada listelenecek -->
                                        <tr>
                                            <td colspan="6" class="text-center">Filtre kaydı bulunamadı.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Faturalar -->
                        <div class="tab-pane fade" id="invoices" role="tabpanel" aria-labelledby="invoices-tab">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="text-primary">Fatura Geçmişi</h6>
                                <a href="#" class="btn btn-sm btn-danger">
                                    <i class="fas fa-plus fa-sm"></i> Yeni Fatura Oluştur
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Fatura No</th>
                                            <th>Tarih</th>
                                            <th>Tutar</th>
                                            <th>Durum</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Eğer fatura verileri varsa burada listelenecek -->
                                        <tr>
                                            <td colspan="5" class="text-center">Fatura kaydı bulunamadı.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Silme Onay Modalı -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">Müşteri Sil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>{{ $customer->name }}</strong> isimli müşteriyi silmek istediğinize emin misiniz?</p>
                <p class="text-danger"><i class="fas fa-exclamation-triangle"></i> Bu işlem geri alınamaz!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                <form action="{{ route('customers.destroy', $customer) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Sil</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tooltips aktif et
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endsection