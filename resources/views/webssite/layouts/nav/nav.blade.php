@php
    $route = Route::currentRouteName();
@endphp
<style>
    @media (max-width: 768px) {
        .logo-wrapper img {
            max-height: 60px !important;
            margin-top: -5px !important;
        }
    }
</style>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo -->
        {{-- <div class="logo-wrapper">
            <a class="logo1" href="{{ '/' }}"> <img src="{{ asset('img/logo.png') }}" alt=""> </a>
        </div> --}}
        <div class="logo-wrapper">
            <a class="logo1" href="{{ '/' }}">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo-img1"
                    style="max-height: 95px; width: auto; object-fit: contain; transition: transform 0.3s ease;">
            </a>
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
