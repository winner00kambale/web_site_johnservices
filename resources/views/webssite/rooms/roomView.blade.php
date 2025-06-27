@extends('webssite.home.master')
@section('contenu')
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4"
        data-background="{{ asset('img/banner.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-90">
                    <h5>{{ $phone->Hotel_name }}</h5>
                    <h1>Nos Chambres</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @foreach ($rooms as $item)
                        <div class="rooms2 mb-90 animate-box" data-animate-effect="fadeInUp">
                            <figure><img src="{{ asset('storage/' . $item->image) }}" alt="" class="img-fluid">
                            </figure>
                            <div class="caption">
                                <h3>{{ $item->price }}$ <span>/ Nuitée</span></h3>
                                <h4><a href="room-details.html">{{ $item->designation }}</a></h4>
                                <p>{{ $item->shot_description_fr }}</p>
                                <div class="row room-facilities">
                                    <div class="col-md-4">
                                        <ul>
                                            <li><i class="flaticon-group"></i> 1-2 Personnes</li>
                                            <li><i class="flaticon-wifi"></i>Wifi Gratuit</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul>
                                            <li><i class="flaticon-bed"></i> Lit double</li>
                                            <li><i class="flaticon-breakfast"></i> Petit-déjeuner</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul>
                                            <li><i class="flaticon-television"></i> TV</li>
                                        </ul>
                                    </div>
                                </div>
                                <hr class="border-2">
                                <div class="info-wrapper">
                                    <div class="butn-dark"> <a href="https://wa.me/243997163443"
                                            target="_blank"><span>Réservez
                                                maintenant</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
