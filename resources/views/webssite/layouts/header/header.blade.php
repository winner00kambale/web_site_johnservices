<header class="header slider-fade">
    <div class="owl-carousel owl-theme">
        @foreach ($slide as $item)
            <div class="text-center item bg-img" data-overlay-dark="2" data-background="storage/{{ $item->image }}">
                <div class="v-middle caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <span>
                                    <i class="star-rating"></i>
                                    <i class="star-rating"></i>
                                    <i class="star-rating"></i>
                                    <i class="star-rating"></i>
                                    <i class="star-rating"></i>
                                </span>
                                <h4>{{ $item->hotel_name }}</h4>
                                <h1>{{ $item->title_fr }}</h1>
                                <div class="butn-light mt-30 mb-30"> <a href="https://wa.me/243997163443"
                                        target="_blank"><span>Contactez &
                                            Nous</span></a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- slider reservation -->
    <div class="reservation">
        <a href="tel:{{ $phone->phone }}">
            <div class="icon d-flex justify-content-center align-items-center">
                <i class="flaticon-call"></i>
            </div>
            @if ($phone && $phone->phone)
                <div class="call"><span>{{ $phone->phone }}</span> <br>Reservation</div>
            @endif
        </a>
    </div>
</header>
