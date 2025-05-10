<!-- resources/views/customers/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Müşteriler</h1>
        <a href="{{ route('customers.create') }}" class="btn btn-danger btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Yeni Müşteri</span>
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold" style="color: #8B0000;">Müşteri Listesi</h6>
            <div class="input-group" style="width: 300px;">
                <input type="text" class="form-control" placeholder="Müşteri Ara..." id="searchInput">
                <button class="btn btn-outline-danger" type="button" id="searchButton">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="customersTable" width="100%" cellspacing="0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Ad Soyad</th>
                            <th>Telefon</th>
                            <th>E-posta</th>
                            <th>İl/İlçe</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->email ?? '-' }}</td>
                            <td>
                                @if ($customer->city)
                                    {{ $customer->city->name }} / {{ $customer->district->name ?? '' }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($customer->status == 'active')
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Pasif</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('customers.show', $customer) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Görüntüle">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('customers.edit', $customer) }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Düzenle">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger delete-btn" 
                                            data-bs-toggle="modal" data-bs-target="#deleteModal" 
                                            data-id="{{ $customer->id }}" data-name="{{ $customer->name }}"
                                            data-bs-toggle="tooltip" title="Sil">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Kayıtlı müşteri bulunamadı.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="d-flex justify-content-end mt-3">
                {{ $customers->links() }}
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
                <p><strong id="customerName"></strong> isimli müşteriyi silmek istediğinize emin misiniz?</p>
                <p class="text-danger"><i class="fas fa-exclamation-triangle"></i> Bu işlem geri alınamaz!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                <form id="deleteForm" method="POST">
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
        // Silme modali için
        const deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const customerId = this.getAttribute('data-id');
                const customerName = this.getAttribute('data-name');
                
                document.getElementById('customerName').textContent = customerName;
                document.getElementById('deleteForm').action = `/customers/${customerId}`;
                
                new bootstrap.Modal(document.getElementById('deleteModal')).show();
            });
        });
        
        // Arama işlevi
        const searchInput = document.getElementById('searchInput');
        const searchButton = document.getElementById('searchButton');
        
        searchButton.addEventListener('click', function() {
            const searchTerm = searchInput.value.trim();
            if (searchTerm) {
                window.location.href = `{{ route('customers.index') }}?search=${searchTerm}`;
            }
        });
        
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchButton.click();
            }
        });
        
        // Tooltips aktif et
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endsection