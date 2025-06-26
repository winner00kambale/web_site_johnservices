@extends('webssite.home.master')
@section('contenu')
    @include('webssite.layouts.header.header')
    <!-- About -->
    @include('webssite.about.about')
    <!-- Rooms -->
    @include('webssite.rooms.room')
    <!-- Pricing -->
    @include('webssite.services.service')
    <!-- Promo Video -->
    @include('webssite.video.video')
    <!-- Facilties -->
    @include('webssite.equipement.equipement')
    <!-- Testiominals -->
    @include('webssite.temoignage.temoignage')
    @include('webssite.actualite.actualite')
    <!-- Reservation & Booking Form -->
    <!-- Clients -->
    @include('webssite.partennaire.partennaire')
@endsection
