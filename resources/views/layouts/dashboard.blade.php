
@include('layouts.header')
@if (Route::has('login'))
    @auth
        @include('layouts.navigation')
    @else
    @endauth
@endif
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        @yield('content')
    </div>
</main>
@include('layouts.footer')
