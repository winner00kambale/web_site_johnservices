<section class="facilties section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle">{{ $phone->Hotel_name }}</div>
                <div class="section-title">Autres Services</div>
            </div>
        </div>
        <div class="row">
            @foreach ($otherService as $item)
                <div class="col-md-4">
                    <div class="single-facility animate-box" data-animate-effect="fadeInUp">
                        <span class="{{ $item->flaticon }}"></span>
                        <h5>{{ $item->title_fr }}</h5>
                        <p>{{ Str::limit($item->description_fr, 85) }}</p>
                        <div class="facility-shape"> <span class="{{ $item->flaticon }}"></span> </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
