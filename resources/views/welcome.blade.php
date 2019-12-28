@if (Route::has('login'))
    @auth
        @include('dashboard.index') 
    @else
        @include('auth.login')
    @endauth
@endif
<h1><a href="{{ route('logout') }}"></a></h1>