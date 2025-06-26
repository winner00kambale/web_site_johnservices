<header class="header slider">
    <div class="owl-carousel owl-theme">
        @foreach ($silde as $item)
            <div class="text-center item bg-img" data-overlay-dark="3"
                data-background="{{ asset('storage/' . $item->image) }}"></div>
        @endforeach
    </div>
    <div class="arrow bounce text-center">
        <a href="#" data-scroll-nav="1" class=""> <i class="ti-arrow-down"></i> </a>
    </div>
</header>
