<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Giriş Yap') — Talx Yönetim</title>

  {{-- Vite ile derlenen CSS + JS --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="guest-body">

  {{-- Ortadaki kart container --}}
  <div class="login-card">

    {{-- Logo --}}
    <div class="login-logo">
      <img src="{{ asset('images/logo.png') }}" alt="Talx Logo">
    </div>

    {{-- Ekran başlığı --}}
    <h1 class="login-title">@yield('title', 'Giriş Yap')</h1>

    {{-- Burada login.blade.php içeriği gelecek --}}
    @yield('content')

  </div>
</body>
</html>
