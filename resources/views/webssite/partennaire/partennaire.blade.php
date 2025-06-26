<section class="clients">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="owl-carousel owl-theme">
                    @foreach ($partenaire as $item)
                        <div class="clients-logo">
                            <a href="{{ $item->website }}"><img src="{{ asset('storage/' . $item->image) }}"
                                    alt=""></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
