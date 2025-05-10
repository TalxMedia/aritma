{{-- resources/views/partials/sidebar.blade.php --}}
<div class="sidebar bg-dark text-white">
    <div class="sidebar-header p-3">
        <a href="{{ route('dashboard') }}" class="text-white text-decoration-none">
            <h5 class="text-danger m-0">Arıtma Sistemi</h5>
        </a>
    </div>
    
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
        </li>
        
        <li class="nav-item">
            <a href="#depoSubmenu" data-bs-toggle="collapse" class="nav-link text-white {{ request()->is('depo*') ? 'active' : '' }}">
                <i class="fas fa-warehouse me-2"></i> Depo Yönetimi
            </a>
            <ul class="collapse {{ request()->is('depo*') ? 'show' : '' }}" id="depoSubmenu">
                <li><a href="{{ url('depo/stok') }}" class="nav-link text-white ps-4 {{ request()->is('depo/stok') ? 'active' : '' }}"><i class="fas fa-box me-2"></i> Depo Stok</a></li>
                <li><a href="{{ url('depo/arac-stok') }}" class="nav-link text-white ps-4 {{ request()->is('depo/arac-stok') ? 'active' : '' }}"><i class="fas fa-truck me-2"></i> Araç Stok</a></li>
                <li><a href="{{ url('depo/urun') }}" class="nav-link text-white ps-4 {{ request()->is('depo/urun') ? 'active' : '' }}"><i class="fas fa-boxes me-2"></i> Ürün Yönetimi</a></li>
            </ul>
        </li>
        
        <li class="nav-item">
            <a href="#montajSubmenu" data-bs-toggle="collapse" class="nav-link text-white {{ request()->is('montaj*') ? 'active' : '' }}">
                <i class="fas fa-tools me-2"></i> Montaj Takibi
            </a>
            <ul class="collapse {{ request()->is('montaj*') ? 'show' : '' }}" id="montajSubmenu">
                <li><a href="{{ url('montaj/ekle') }}" class="nav-link text-white ps-4 {{ request()->is('montaj/ekle') ? 'active' : '' }}"><i class="fas fa-plus me-2"></i> Montaj Ekle</a></li>
                <li><a href="{{ url('montaj/tum') }}" class="nav-link text-white ps-4 {{ request()->is('montaj/tum') ? 'active' : '' }}"><i class="fas fa-list me-2"></i> Tüm Montajlar</a></li>
                <li><a href="{{ url('montaj/bekleyen') }}" class="nav-link text-white ps-4 {{ request()->is('montaj/bekleyen') ? 'active' : '' }}"><i class="fas fa-clock me-2"></i> Bekleyen Montajlar</a></li>
                <li><a href="{{ url('montaj/tamamlanan') }}" class="nav-link text-white ps-4 {{ request()->is('montaj/tamamlanan') ? 'active' : '' }}"><i class="fas fa-check me-2"></i> Tamamlanmış Montajlar</a></li>
                <li><a href="{{ url('montaj/iptal') }}" class="nav-link text-white ps-4 {{ request()->is('montaj/iptal') ? 'active' : '' }}"><i class="fas fa-times me-2"></i> İptal Olan Montajlar</a></li>
                <li><a href="{{ url('montaj/deneme') }}" class="nav-link text-white ps-4 {{ request()->is('montaj/deneme') ? 'active' : '' }}"><i class="fas fa-vial me-2"></i> Deneme Sürecindekiler</a></li>
            </ul>
        </li>
        
        <li class="nav-item">
            <a href="#cariSubmenu" data-bs-toggle="collapse" class="nav-link text-white {{ request()->is('cari*') ? 'active' : '' }}">
                <i class="fas fa-address-book me-2"></i> Cari Yönetimi
            </a>
            <ul class="collapse {{ request()->is('cari*') ? 'show' : '' }}" id="cariSubmenu">
                <li><a href="{{ route('customers.index') }}" class="nav-link text-white ps-4 {{ request()->routeIs('customers.*') ? 'active' : '' }}"><i class="fas fa-users me-2"></i> Müşteriler</a></li>
                <li><a href="{{ url('cari/tedarikciler') }}" class="nav-link text-white ps-4 {{ request()->is('cari/tedarikciler') ? 'active' : '' }}"><i class="fas fa-industry me-2"></i> Tedarikçiler</a></li>
                <li><a href="{{ url('cari/filtre-takibi') }}" class="nav-link text-white ps-4 {{ request()->is('cari/filtre-takibi') ? 'active' : '' }}"><i class="fas fa-filter me-2"></i> Filtre Takibi</a></li>
            </ul>
        </li>
        
        <li class="nav-item">
            <a href="#personelSubmenu" data-bs-toggle="collapse" class="nav-link text-white {{ request()->is('personel*') ? 'active' : '' }}">
                <i class="fas fa-user-tie me-2"></i> Personel Takibi
            </a>
            <ul class="collapse {{ request()->is('personel*') ? 'show' : '' }}" id="personelSubmenu">
                <li><a href="{{ url('personel/tum') }}" class="nav-link text-white ps-4 {{ request()->is('personel/tum') ? 'active' : '' }}"><i class="fas fa-users me-2"></i> Tüm Personeller</a></li>
                <li><a href="{{ url('personel/cagri-merkezi') }}" class="nav-link text-white ps-4 {{ request()->is('personel/cagri-merkezi') ? 'active' : '' }}"><i class="fas fa-headset me-2"></i> Çağrı Merkezi</a></li>
                <li><a href="{{ url('personel/filtre-ekibi') }}" class="nav-link text-white ps-4 {{ request()->is('personel/filtre-ekibi') ? 'active' : '' }}"><i class="fas fa-filter me-2"></i> Filtre Ekibi</a></li>
                <li><a href="{{ url('personel/teknik-servis') }}" class="nav-link text-white ps-4 {{ request()->is('personel/teknik-servis') ? 'active' : '' }}"><i class="fas fa-tools me-2"></i> Teknik Servis Ekibi</a></li>
                <li><a href="{{ url('personel/depo-ekibi') }}" class="nav-link text-white ps-4 {{ request()->is('personel/depo-ekibi') ? 'active' : '' }}"><i class="fas fa-warehouse me-2"></i> Depo Ekibi</a></li>
                <li><a href="{{ url('personel/yonetim') }}" class="nav-link text-white ps-4 {{ request()->is('personel/yonetim') ? 'active' : '' }}"><i class="fas fa-user-shield me-2"></i> Yönetim</a></li>
            </ul>
        </li>
        
        <li class="nav-item">
            <a href="#raporlarSubmenu" data-bs-toggle="collapse" class="nav-link text-white {{ request()->is('raporlar*') ? 'active' : '' }}">
                <i class="fas fa-chart-bar me-2"></i> Raporlar
            </a>
            <ul class="collapse {{ request()->is('raporlar*') ? 'show' : '' }}" id="raporlarSubmenu">
                <li><a href="{{ url('raporlar/kullanici') }}" class="nav-link text-white ps-4 {{ request()->is('raporlar/kullanici') ? 'active' : '' }}"><i class="fas fa-users me-2"></i> Kullanıcı Raporları</a></li>
                <li><a href="{{ url('raporlar/satis') }}" class="nav-link text-white ps-4 {{ request()->is('raporlar/satis') ? 'active' : '' }}"><i class="fas fa-shopping-cart me-2"></i> Satış Raporları</a></li>
                <li><a href="{{ url('raporlar/montaj') }}" class="nav-link text-white ps-4 {{ request()->is('raporlar/montaj') ? 'active' : '' }}"><i class="fas fa-tools me-2"></i> Montaj Raporları</a></li>
                <li><a href="{{ url('raporlar/gelir-gider') }}" class="nav-link text-white ps-4 {{ request()->is('raporlar/gelir-gider') ? 'active' : '' }}"><i class="fas fa-money-bill-wave me-2"></i> Gelir-Gider Raporları</a></li>
                <li><a href="{{ url('raporlar/stok') }}" class="nav-link text-white ps-4 {{ request()->is('raporlar/stok') ? 'active' : '' }}"><i class="fas fa-boxes me-2"></i> Stok Raporları</a></li>
            </ul>
        </li>
        
        <li class="nav-item">
            <a href="#muhasebeSubmenu" data-bs-toggle="collapse" class="nav-link text-white {{ request()->is('muhasebe*') ? 'active' : '' }}">
                <i class="fas fa-file-invoice-dollar me-2"></i> Muhasebe
            </a>
            <ul class="collapse {{ request()->is('muhasebe*') ? 'show' : '' }}" id="muhasebeSubmenu">
                <li><a href="{{ url('muhasebe/giden-faturalar') }}" class="nav-link text-white ps-4 {{ request()->is('muhasebe/giden-faturalar') ? 'active' : '' }}"><i class="fas fa-file-export me-2"></i> Giden Faturalar</a></li>
                <li><a href="{{ url('muhasebe/gelen-faturalar') }}" class="nav-link text-white ps-4 {{ request()->is('muhasebe/gelen-faturalar') ? 'active' : '' }}"><i class="fas fa-file-import me-2"></i> Gelen Faturalar</a></li>
                <li><a href="{{ url('muhasebe/personel-giderleri') }}" class="nav-link text-white ps-4 {{ request()->is('muhasebe/personel-giderleri') ? 'active' : '' }}"><i class="fas fa-user-tie me-2"></i> Personel Giderleri</a></li>
                <li><a href="{{ url('muhasebe/teknik-giderler') }}" class="nav-link text-white ps-4 {{ request()->is('muhasebe/teknik-giderler') ? 'active' : '' }}"><i class="fas fa-tools me-2"></i> Teknik Giderler</a></li>
            </ul>
        </li>
        
        <li class="nav-item mt-4">
            <a href="{{ route('logout') }}" class="nav-link text-white" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt me-2"></i> Çıkış Yap
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>