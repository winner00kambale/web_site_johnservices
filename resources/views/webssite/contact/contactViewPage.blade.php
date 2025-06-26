@extends('webssite.home.master')
@section('contenu')
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4"
        data-background="{{ asset('img/banner.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-90">
                    <h5>{{ $phone->Hotel_name }}</h5>
                    <h1>Contactez-nous</h1>
                </div>
            </div>
        </div>
    </div>
    @include('webssite.contact.contact')
    {{-- @include('webssite.partennaire.partennaire') --}}
@endsection
