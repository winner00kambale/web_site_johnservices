<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle">Images</div>
                <div class="section-title">Images Gallerie</div>
            </div>

            @foreach ($gallery as $item)
                <div class="col-md-4 gallery-item mb-4">
                    <a href="{{ asset('storage/' . $item->image) }}" class="img-zoom d-block">
                        <div class="gallery-box">
                            <div class="gallery-img fixed-size">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="work-img">
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</section>

{{-- <section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle">Images</div>
                <div class="section-title">Images Gallerie</div>
            </div>
            <!-- 3 columns -->
            @foreach ($gallery as $item)
                <div class="col-md-4 gallery-item">
                    <a href="{{ asset('storage/' . $item->image) }}" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="{{ asset('storage/' . $item->image) }}"
                                    class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section> --}}
