@php
    $route = Route::currentRouteName();
@endphp
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo -->
        <div class="logo-wrapper">
            <a class="logo" href="{{ '/' }}"> <img src="{{ asset('img/logo.png') }}" class="logo-img"
                    alt=""> </a>
        </div>
        <!-- Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span
                class="navbar-toggler-icon"><i class="ti-menu"></i></span> </button>
        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ $route == 'home.controller' ? 'active' : '' }}"
                        href="{{ url('/') }}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $route == 'about.controller' ? 'active' : '' }}"
                        href="{{ route('about.controller') }}">À propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $route == 'room.controller' ? 'active' : '' }}"
                        href="{{ route('room.controller') }}">Hébergement</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $route == 'service.controller' ? 'active' : '' }}"
                        href="{{ route('service.controller') }}">Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $route == 'gallery.controller' ? 'active' : '' }}"
                        href="{{ route('gallery.controller') }}">Gallerie</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $route == 'event.controller' ? 'active' : '' }}"
                        href="{{ route('event.controller') }}">Événements</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $route == 'contact.controller' ? 'active' : '' }}"
                        href="{{ route('contact.controller') }}">Contact</a>
                </li>
                </li>
            </ul>
        </div>
    </div>
</nav>
