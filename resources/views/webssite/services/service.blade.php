<section class="pricing section-padding bg-blck">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="section-subtitle"><span>Meilleurs prix</span></div>
                <div class="section-title"><span>Nos Services</span></div>
                <p class="color-2">{{ $phone->short_description_fr }}</p>
                <div class="reservations mb-30">
                    <div class="icon"><span class="flaticon-call"></span></div>
                    <div class="text">
                        <p class="color-2">Pour information</p> <a
                            href="tel:{{ $phone->phone }}">{{ $phone->phone }}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="owl-carousel owl-theme">
                    @foreach ($data as $item)
                        <div class="pricing-card">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="">
                            <div class="desc">
                                <div class="name">{{ $item->title_fr }}</div>
                                <ul class="list-unstyled list">
                                    <li><i class="ti-check"></i> {{ Str::limit($item->description_fr, 95) }}</li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
