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
                        {{-- <p>{{ $phone->short_description_fr }}</p> --}}
                        <p>
                            <span style="font-size: 1.3em; color: #66b22a;">John Services Motel</span>
                            <br>
                            <span class="font-size: 1.2em;">Est un établissement moderne qui allie confort, hospitalité et
                                fonctionnalité pour répondre aux
                                besoins variés des voyageurs, professionnels et résidents.</span>
                        </p>
                        <p>
                            <span style="font-size: 1.3em; color: #66b22a;">Présentation
                                générale</span> <br>
                            Situé à Goma, dans le quartier les volcans sur l'avenue les messagers N13-B en diagonale de
                            l'ecobank. JohnServicesMotel propose un hébergement de qualité, un service de restauration
                            soigné et des salles de réunion bien équipées. Que ce soit pour un séjour de détente, un voyage
                            d’affaires ou une rencontre professionnelle, nous offrons un cadre agréable, sécurisé et adapté.
                        </p>
                        <p><span style="font-size: 1.3em; color: #66b22a;">Vision</span> <br>
                            Être une référence en matière d’accueil et de confort dans la ville de goma, en offrant une
                            expérience client inoubliable.</p>
                        <p><span style="font-weight: bold; font-size: 1.3em; color: #66b22a;">Mission</span> <br>
                            Offrir un service d’hébergement confortable, une restauration savoureuse et des salles de
                            réunion fonctionnelles, dans un cadre sécurisé et accueillant.</p>
                        <p><span style="font-weight: bold; font-size: 1.3em; color: #66b22a;">Nos valeurs</span> <br>
                            Professionnalisme,Hospitalité,Propreté,Sécurité et Écoute client.</p>
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
