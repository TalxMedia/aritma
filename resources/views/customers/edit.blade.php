<!-- resources/views/customers/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Müşteri Düzenle</h1>
        <div>
            <a href="{{ route('customers.show', $customer) }}" class="btn btn-info btn-icon-split me-2">
                <span class="icon text-white-50">
                    <i class="fas fa-eye"></i>
                </span>
                <span class="text">Görüntüle</span>
            </a>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Geri Dön</span>
            </a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3" style="background-color: #FAF0F0;">
            <h6 class="m-0 font-weight-bold" style="color: #8B0000;">Müşteri Bilgileri</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('customers.update', $customer) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Ad Soyad <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $customer->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Telefon <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $customer->phone) }}" required>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">E-posta</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $customer->email) }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="identity_number" class="form-label">TC Kimlik No / Vergi No</label>
                        <input type="text" class="form-control @error('identity_number') is-invalid @enderror" id="identity_number" name="identity_number" value="{{ old('identity_number', $customer->identity_number) }}">
                        @error('identity_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="city_id" class="form-label">İl</label>
                        <select class="form-select @error('city_id') is-invalid @enderror" id="city_id" name="city_id">
                            <option value="">İl Seçin</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}" {{ old('city_id', $customer->city_id) == $city->id ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('city_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-4">
                        <label for="district_id" class="form-label">İlçe</label>
                        <select class="form-select @error('district_id') is-invalid @enderror" id="district_id" name="district_id" {{ $customer->city_id ? '' : 'disabled' }}>
                            <option value="">İlçe Seçin</option>
                            @foreach($districts as $district)
                                <option value="{{ $district->id }}" {{ old('district_id', $customer->district_id) == $district->id ? 'selected' : '' }}>
                                    {{ $district->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('district_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-4">
                        <label for="status" class="form-label">Durum</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                            <option value="active" {{ old('status', $customer->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status', $customer->status) == 'inactive' ? 'selected' : '' }}>Pasif</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="address" class="form-label">Adres</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3">{{ old('address', $customer->address) }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="notes" class="form-label">Notlar</label>
                    <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="3">{{ old('notes', $customer->notes) }}</textarea>
                    @error('notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('customers.show', $customer) }}" class="btn btn-light me-md-2">İptal</a>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-save"></i> Güncelle
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // İl ve ilçe bağlantısı
        const citySelect = document.getElementById('city_id');
        const districtSelect = document.getElementById('district_id');
        
        citySelect.addEventListener('change', function() {
            const cityId = this.value;
            
            // İlçe select'ini sıfırla ve aktifleştir/devre dışı bırak
            districtSelect.innerHTML = '<option value="">İlçe Seçin</option>';
            
            if (cityId) {
                districtSelect.disabled = true;
                
                // İlçeleri getir
                fetch(`{{ route('get.districts') }}?city_id=${cityId}`)
                    .then(response => response.json())
                    .then(data => {
                        districtSelect.disabled = false;
                        
                        data.forEach(district => {
                            const option = document.createElement('option');
                            option.value = district.id;
                            option.textContent = district.name;
                            districtSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('İlçeler yüklenirken bir hata oluştu:', error);
                    });
            } else {
                districtSelect.disabled = true;
            }
        });
        
        // Sayfa yüklendiğinde bir il seçili ise ilçeleri getir
        if (citySelect.value) {
            // Mevcut ilçeleri korumalıyız, bu nedenle burada bir şey yapmıyoruz
        }
    });
</script>
@endsection