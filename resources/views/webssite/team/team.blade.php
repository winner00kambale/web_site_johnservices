<section class="team section-padding bg-cream">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle">Professionnelle</div>
                <div class="section-title">Notre équipe</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 owl-carousel owl-theme">
                @foreach ($team as $item)
                    <div class="item">
                        <div class="img"> <img src="{{ asset('storage/' . $item->image) }}" alt=""
                                style="width: 350px; height: auto;"> </div>
                        <div class="info">
                            <h6>{{ $item->name }}</h6>
                            <p>{{ $item->title_fr }}</p>
                            <div class="social valign">
                                <div class="full-width">
                                    <a href="{{ $item->twitter }}" target="_blank"><i class="ti-twitter"></i></a>
                                    <a href="{{ $item->facebook }} " target="_blank"><i class="ti-facebook"></i></a>
                                    <a href="{{ $item->linkedin }}" target="_blank"><i class="ti-linkedin"></i></a>
                                    <p>{{ $item->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
