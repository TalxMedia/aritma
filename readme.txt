ARITMA SİSTEMİ YÖNETİM UYGULAMASI
=================================

Proje Hakkında
-------------
Bu proje, arıtma sistemleri yönetimi için geliştirilmiş kapsamlı bir web uygulamasıdır. Laravel framework'ü kullanılarak geliştirilmiştir.

Ana Özellikler
-------------
1. Müşteri Yönetimi
   - Müşteri bilgileri (ad, telefon, e-posta, TC/Vergi no)
   - Adres bilgileri (il, ilçe bazlı)
   - Müşteri durumu takibi (aktif/pasif)

2. Filtre ve Ürün Yönetimi
   - Filtre takibi
   - Filtre değişim planlaması
   - Ürün stok yönetimi
   - Filtre kategorileri

3. Kurulum ve Bakım
   - Müşteri kurulumları
   - Bakım planlaması
   - Filtre değişim takibi

4. Stok Yönetimi
   - Depo yönetimi
   - Araç stok takibi
   - Ürün stok takibi

5. Araç Yönetimi
   - Araç bilgileri
   - Araç stok takibi
   - Araç bazlı gider takibi

6. Finansal Yönetim
   - Fatura yönetimi
   - Gider takibi
   - Kategori bazlı gider raporlama

7. Kullanıcı ve Yetkilendirme
   - Rol tabanlı yetkilendirme
   - Kullanıcı yönetimi
   - İzin yönetimi

Veritabanı Yapısı
---------------
1. Temel Tablolar
   - users: Kullanıcı bilgileri
   - customers: Müşteri bilgileri
   - products: Ürün bilgileri
   - filters: Filtre bilgileri
   - installations: Kurulum bilgileri

2. Stok Yönetimi Tabloları
   - warehouses: Depo bilgileri
   - warehouse_stocks: Depo stok takibi
   - vehicles: Araç bilgileri
   - vehicle_stocks: Araç stok takibi

3. Finansal Tablolar
   - invoices: Fatura bilgileri
   - invoice_items: Fatura kalemleri
   - expenses: Gider kayıtları

4. Sistem Tabloları
   - roles: Kullanıcı rolleri
   - permissions: Sistem izinleri
   - activity_logs: Sistem aktivite kayıtları

Teknik Detaylar
-------------
1. Framework: Laravel
2. Veritabanı: MariaDB
3. Frontend: Blade Templates
4. Authentication: Laravel Auth

Kurulum Gereksinimleri
--------------------
1. PHP >= 8.1
2. Composer
3. MariaDB >= 10.11
4. Node.js ve NPM
5. Web sunucusu (Apache/Nginx)

Kurulum Adımları
--------------
1. Projeyi klonlayın
2. Composer bağımlılıklarını yükleyin: composer install
3. .env dosyasını oluşturun ve veritabanı ayarlarını yapın
4. Veritabanı migrationlarını çalıştırın: php artisan migrate
5. NPM bağımlılıklarını yükleyin: npm install
6. Frontend varlıklarını derleyin: npm run dev

Güvenlik
--------
1. Rol tabanlı yetkilendirme sistemi
2. Aktivite logları
3. Güvenli şifre politikaları
4. CSRF koruması
5. XSS koruması

Geliştirme Notları
----------------
1. Yeni özellikler için migration dosyaları oluşturulmalı
2. Model ilişkileri doğru tanımlanmalı
3. Controller'lar resource yapısına uygun olmalı
4. Blade view'lar modüler yapıda olmalı
5. Tüm işlemler için aktivite logları tutulmalı

Bakım ve Destek
-------------
1. Düzenli veritabanı yedekleme
2. Log dosyalarının takibi
3. Sistem güncellemelerinin test edilmesi
4. Performans optimizasyonları
5. Güvenlik güncellemeleri

Not: Bu dokümantasyon projenin genel yapısını ve özelliklerini özetlemektedir. Detaylı teknik dokümantasyon için ilgili kod dosyalarına referans verilmelidir. 

GitHub Repository Dosya Listesi
-----------------------------
1. .composer/.htaccess
   URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/14249c50bd7605225950b2d372f352a2dba9252a

2. .composer/cache/.htaccess
   URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/14249c50bd7605225950b2d372f352a2dba9252a

3. .composer/cache/files/fakerphp/faker/cd3ee3e52b771fb0718af48c0ecde2cd7f473bdc.zip
   URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/32556bef8cfb493e9c5d3ac07e4b6c6c96f7cb79

4. .composer/cache/files/filp/whoops/739a65a04d5d8f90155d989981166641d63b7fdd.zip
   URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/e0487e4d9afd6b9c63b19acc1b5634044f11ccae

5. .composer/cache/files/hamcrest/hamcrest-php/7ac05900d9d3c4092f0c5ff3f56676f924aca22f.zip
   URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/66d882fc5aa93f9e7ba0a5d92c33c95028df3b1b

6. .composer/cache/files/laravel/pail/f0e066cfdae1d656cf4df0ded01f9f2cbe33b591.zip
   URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/fa16473de7a3e66d48e6f7ddc70aa53b44644555

7. .composer/cache/files/laravel/pint/cb067b4b4484d283a09dc4004534381f029b06ad.zip
   URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/0ebb24e6a113f330b3ed5e6d5f6434eb5b86220d

8. app/Models/ActivityLog.php
   URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

9. app/Models/Category.php
   URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

10. app/Models/City.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

11. app/Models/Customer.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

12. app/Models/District.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

13. app/Models/Expense.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

14. app/Models/Filter.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

15. app/Models/FilterChange.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

16. app/Models/Installation.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

17. app/Models/Invoice.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

18. app/Models/InvoiceItem.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

19. app/Models/Notification.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

20. app/Models/Permission.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

21. app/Models/Product.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

22. app/Models/Role.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

23. app/Models/Supplier.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

24. app/Models/User.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

25. app/Models/Vehicle.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

26. app/Models/VehicleStock.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

27. app/Models/Warehouse.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

28. app/Models/WarehouseStock.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

29. app/Http/Controllers/CustomerController.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

30. app/Http/Controllers/DashboardController.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

31. config/app.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

32. config/auth.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

33. config/database.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

34. database/migrations/2024_01_01_000001_create_customers_table.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

35. database/migrations/2024_01_01_000002_create_filters_table.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

36. database/migrations/2024_01_01_000003_create_installations_table.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

37. database/migrations/2024_01_01_000004_create_invoices_table.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

38. database/migrations/2024_01_01_000005_create_products_table.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

39. database/migrations/2024_01_01_000006_create_vehicles_table.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

40. database/migrations/2024_01_01_000007_create_warehouses_table.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

41. resources/views/customers/index.blade.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

42. resources/views/dashboard/index.blade.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

43. resources/views/layouts/app.blade.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

44. routes/web.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

45. storage/framework/.gitignore
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/05c4471f2b53fc17d3cac9d3d252755a35479f7c

46. storage/framework/cache/.gitignore
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/01e4a6cda9eb380973b23a40d562bca8a3a198b4

47. storage/framework/cache/data/.gitignore
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/d6b7ef32c8478a48c3994dcadc86837f4371184d

48. storage/framework/sessions/.gitignore
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/d6b7ef32c8478a48c3994dcadc86837f4371184d

49. storage/framework/testing/.gitignore
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/d6b7ef32c8478a48c3994dcadc86837f4371184d

50. storage/framework/views/.gitignore
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/d6b7ef32c8478a48c3994dcadc86837f4371184d

51. storage/logs/.gitignore
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/d6b7ef32c8478a48c3994dcadc86837f4371184d

52. tests/Feature/ExampleTest.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/8364a84e2b7eea9f007e99a5d3333273fe30bf8a

53. tests/TestCase.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/fe1ffc2ff1abc1c23522418994879623c5647859

54. tests/Unit/ExampleTest.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/5773b0ceb771e176520d5a9c1efe5e918878318d

55. vite.config.js
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/62c59d7dcf19a4f60c78920595add7311b3823cb

56. .editorconfig
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

57. .gitattributes
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

58. .gitignore
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

59. .htaccess
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

60. .user.ini
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

61. README.md
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

62. aritma-schema.sql
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

63. artisan
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

64. build
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

65. composer.json
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

66. composer.lock
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

67. favicon.ico
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

68. index.php
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

69. logo.png
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

70. package-lock.json
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

71. package.json
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

72. phpunit.xml
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

73. robots.txt
    URL: https://api.github.com/repos/TalxMedia/aritma/git/blobs/[SHA]

    bu bir sınamadır. bunu da işleyelim.

Not: Bazı dosyaların SHA değerleri API yanıtında tam olarak görünmediği için [SHA] olarak işaretlenmiştir. Bu dosyaların tam URL'lerini almak için GitHub API'ye ayrıca istek yapılması gerekmektedir. 