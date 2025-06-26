@extends('webssite.home.master')
@section('contenu')
    @include('webssite.banner.banner')

    <section class="about section-padding">
        <div class="container">
            <div class="row">
                @if ($phone && $phone->phone)
                    <div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInUp">
                        <span>
                            <i class="star-rating"></i>
                            <i class="star-rating"></i>
                            <i class="star-rating"></i>
                            <i class="star-rating"></i>
                            <i class="star-rating"></i>
                        </span>
                        <div class="section-subtitle">{{ $phone->Hotel_name }}</div>
                        <div class="section-title">{{ $phone->title_fr }}</div>
                        <p>{{ $phone->short_description_fr }}</p>
                        <!-- call -->
                        <div class="reservations">
                            <div class="icon"><span class="flaticon-call"></span></div>
                            <div class="text">
                                <p>Reservation</p> <a href="tel:{{ $phone->phone }}">{{ $phone->phone }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3 animate-box" data-animate-effect="fadeInUp">
                        <img src="storage/{{ $phone->image1 }}" alt="" class="mt-90 mb-30">
                    </div>
                    <div class="col col-md-3 animate-box" data-animate-effect="fadeInUp">
                        <img src="storage/{{ $phone->image2 }}" alt="">
                    </div>
                @endif
            </div>
        </div>
    </section>
    @include('webssite.services.service')
    @include('webssite.team.team')
    @include('webssite.temoignage.temoignage')
@endsection
