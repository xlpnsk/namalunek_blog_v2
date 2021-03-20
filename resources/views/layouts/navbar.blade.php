<!doctype html>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('/') }}"> <img src="/proj/public/photos/logo2.png" alt="logo" width="166" height="73"> </a>
        <a class="navbar-brand" href="{{ route('/') }}"> Main page </a>
        <a class="navbar-brand" href="{{ route('about') }}"> About us </a>
        <a class="navbar-brand" href="{{ route('contact') }}"> Contact </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a href="{{ url('/home') }}" class="dropdown-item">Home</a></li>
                            <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a>
                            <form id="logout-form" action="{{ route('logout') }}"
                                  method="POST" style="display: none;">
                                @csrf
                            </form>
                            </li>
                        </ul>
                    </li>

                @endguest
            </ul>
        </div>

    </div>
</nav>





