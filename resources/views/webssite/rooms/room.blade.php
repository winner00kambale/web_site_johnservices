<section class="rooms1 section-padding bg-cream" data-scroll-index="1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle">{{ $phone->Hotel_name }}</div>
                <div class="section-title">Nos Chambres</div>
            </div>
        </div>
        <div class="row">
            @foreach ($rooms as $item)
                <div class="col-md-4">
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="{{ asset('storage/' . $item->image) }}"
                                alt=""> </div> <span class="category"><a
                                href="{{ '/' }}">Book</a></span>
                        <div class="con">
                            <h6><a href="room-details.html">{{ $item->price }} / Nuitée</a></h6>
                            <h5><a href="room-details.html">{{ $item->designation }}</a> </h5>
                            <div class="line"></div>
                            <div class="row facilities">
                                <div class="col col-md-7">
                                    <ul>
                                        <li><i class="flaticon-bed"></i></li>
                                        <li><i class="flaticon-bath"></i></li>
                                        <li><i class="flaticon-breakfast"></i></li>
                                        <li><i class="flaticon-towel"></i></li>
                                    </ul>
                                </div>
                                <div class="col col-md-5 text-end">
                                    <div class="permalink"><a href="{{ route('room.controller') }}">VOIR PLUS
                                            <i class="ti-arrow-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
