{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.guest')

@section('title', 'Hemen Giriş Yap')

@section('content')
  <form method="POST" action="{{ route('login') }}">
    @csrf

    {{-- E-posta --}}
    <div>
      <label for="email">E-posta Adresi</label>
      <input id="email" name="email" type="email" required autofocus value="{{ old('email') }}">
    </div>

    {{-- Parola --}}
    <div>
      <label for="password">Parola</label>
      <input id="password" name="password" type="password" required>
    </div>

    {{-- Beni Hatırla --}}
    <div class="remember">
      <input id="remember" type="checkbox" name="remember">
      <label for="remember">Beni Hatırla</label>
    </div>

    {{-- Giriş Butonu --}}
    <button type="submit">Giriş Yap 🔥</button>

    {{-- Şifremi Unuttum --}}
    @if(Route::has('password.request'))
      <div class="forgot">
        <a href="{{ route('password.request') }}">Şifreni Unuttun?</a>
      </div>
    @endif
  </form>
@endsection
