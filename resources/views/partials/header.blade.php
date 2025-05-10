{{-- resources/views/partials/header.blade.php --}}
<nav class="navbar navbar-expand header">
    <div class="container-fluid">
        <div class="header-left">
            <button class="sidebar-toggle d-lg-none">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
        </div>
        
        <div class="header-right">
            <div class="dropdown">
                <a href="#" class="notification-icon" id="notificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge">3</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown">
                    <li><h6 class="dropdown-header">Bildirimler</h6></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-filter text-warning"></i> 2 adet filtre değişimi yaklaşıyor</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-box text-danger"></i> Stokta azalan ürünler var</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-tools text-info"></i> 5 adet montaj tamamlandı</a></li>
                </ul>
            </div>
            
            <div class="dropdown ms-3">
                <a href="#" class="user-dropdown" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <span class="user-name d-none d-md-inline-block">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#"><i class="fas fa-user-circle me-2"></i> Profil</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Ayarlar</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i> Çıkış Yap
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>