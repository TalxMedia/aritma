// Kernel.php içinde protected $routeMiddleware array'ine ekleyin
protected $routeMiddleware = [
    // Mevcut middleware'ler...
    'role' => \App\Http\Middleware\CheckRole::class,
    'permission' => \App\Http\Middleware\CheckPermission::class,
];