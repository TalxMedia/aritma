// resources/js/app.js

// 1) Bootstrap'ın CSS'i
import 'bootstrap/dist/css/bootstrap.min.css';

// 2) Projeye özel global CSS
import '../css/app.css';

// 3) Bootstrap'ın JS'i (Popper zaten bundle içinde)
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

// 4) Laravel'in kendi bootstrap.js'i (Axios, Echo vb.)
import './bootstrap';

// DOM yüklendikten sonra çalışacak kod
document.addEventListener('DOMContentLoaded', function() {
    // 1. Sidebar dropdown toggle işlevi
    const dropdownToggles = document.querySelectorAll('.sidebar-dropdown-toggle');
    
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            // Hedef submenu ID'sini al
            const targetId = this.getAttribute('data-target');
            const targetMenu = document.getElementById(targetId);
            
            // Aktif durumu toggle et
            this.classList.toggle('open');
            
            // Submenu'yü aç/kapat
            if (targetMenu.classList.contains('open')) {
                targetMenu.classList.remove('open');
            } else {
                targetMenu.classList.add('open');
            }
        });
    });
    
    // 2. Sidebar toggle (mobil görünüm)
    const sidebarToggles = document.querySelectorAll('.sidebar-toggle');
    
    sidebarToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        });
    });
    
    // 3. Sidebar collapse toggle (desktop)
    const sidebarCollapseToggle = document.getElementById('sidebar-collapse-toggle');
    
    if (sidebarCollapseToggle) {
        sidebarCollapseToggle.addEventListener('click', function() {
            document.body.classList.toggle('sidebar-collapsed');
        });
    }
    
    // 4. Dropdown menüler için
    const dropdowns = document.querySelectorAll('.dropdown-toggle');
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', function(e) {
            e.stopPropagation();
            const dropdownMenu = this.nextElementSibling;
            dropdownMenu.classList.toggle('show');
        });
    });
    
    // 5. Sayfa dışına tıklandığında dropdown'ları kapat
    document.addEventListener('click', function(e) {
        const dropdownMenus = document.querySelectorAll('.dropdown-menu.show');
        dropdownMenus.forEach(menu => {
            if (!menu.contains(e.target)) {
                menu.classList.remove('show');
            }
        });
    });
});