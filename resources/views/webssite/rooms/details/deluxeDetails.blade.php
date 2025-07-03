@extends('webssite.home.master')
@section('contenu')
    <header class="header slider">
        <div class="owl-carousel owl-theme">
            <div class="text-center item bg-img" data-overlay-dark="3" data-background="{{ asset('img/deluxe/1.jpeg') }}">
            </div>
            <div class="text-center item bg-img" data-overlay-dark="3" data-background="{{ asset('img/deluxe/2.jpeg') }}">
            </div>
            <div class="text-center item bg-img" data-overlay-dark="3" data-background="{{ asset('img/deluxe/3.jpeg') }}">
            </div>
        </div>
        <div class="arrow bounce text-center">
            <a href="#" data-scroll-nav="1" class=""> <i class="ti-arrow-down"></i> </a>
        </div>
    </header>
    @include('webssite.rooms.details.roomsAllPageDetails')
    <section class="testimonials">
        <div class="background bg-img bg-fixed section-padding pb-0"
            data-background="{{ asset('storage/' . $room->image) }}">"
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="testimonials-box">
                            <div class="head-box">
                                <h6>Temoignages</h6>
                                <h4>Ce que les gens disents de nous</h4>
                                <div class="line"></div>
                            </div>
                            <div class="owl-carousel owl-theme">
                                @foreach ($temoignage as $item)
                                    <div class="item">
                                        <span class="quote"><img src="{{ asset('storage/' . $item->image) }}"
                                                alt=""></span>
                                        <p>{{ $item->description_fr }}</p>
                                        <div class="info">
                                            <div class="author-img"> <img src="{{ asset('storage/' . $item->image) }}"
                                                    alt=""> </div>
                                            <div class="cont"> <span><i class="star-rating"></i><i
                                                        class="star-rating"></i><i class="star-rating"></i><i
                                                        class="star-rating"></i><i class="star-rating"></i></span>
                                                <h6>{{ $item->name }}</h6> <span>{{ $item->fonction_fr }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('webssite.partennaire.partennaire')
@endsection
