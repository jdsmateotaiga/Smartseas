@include('layouts.header')

@if (Route::has('login'))
    @auth
        @include('layouts.navigation')
    @else
        @yield('content')
    @endauth
@endif

@include('layouts.footer')