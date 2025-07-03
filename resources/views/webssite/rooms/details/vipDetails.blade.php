@extends('webssite.home.master')
@section('contenu')
    <header class="header slider">
        <div class="owl-carousel owl-theme">
            <div class="text-center item bg-img" data-overlay-dark="3" data-background="{{ asset('img/vip/1.jpeg') }}"></div>
            <div class="text-center item bg-img" data-overlay-dark="3" data-background="{{ asset('img/vip/2.jpeg') }}"></div>
            <div class="text-center item bg-img" data-overlay-dark="3" data-background="{{ asset('img/vip/3.jpeg') }}"></div>
        </div>
        <div class="arrow bounce text-center">
            <a href="#" data-scroll-nav="1" class=""> <i class="ti-arrow-down"></i> </a>
        </div>
    </header>
    @include('webssite.rooms.details.roomsAllPageDetails')
@endsection
