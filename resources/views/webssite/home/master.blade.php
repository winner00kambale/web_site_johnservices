<!DOCTYPE html>
<html lang="zxx">

@include('webssite.layouts.header.heade')

<body>
    <!-- Preloader -->
    <div class="preloader-bg"></div>
    <div id="preloader">
        <div id="preloader-status">
            <div class="preloader-position loader"> <span></span> </div>
        </div>
    </div>
    <!-- Progress scroll totop -->
    @include('webssite.layouts.header.progressebar.progress')
    <!-- Navbar -->
    @include('webssite.layouts.nav.nav')
    <!-- Slider -->
    {{-- @include('webssite.layouts.header.header') --}}

    @yield('contenu')
    <!-- Footer -->
    @include('webssite.layouts.footer.footer')
    <!-- jQuery -->
    @include('webssite.layouts.footer.script')
</body>

</html>
