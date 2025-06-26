<section id="menu" class="restaurant-menu menu section-padding bg-blck">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-subtitle"><span>{{ $phone->Hotel_name }}</span></div>
                <div class="section-title"><span>Menu Restaurant</span></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="tabs-icon col-md-10 offset-md-1 text-center">
                        <div class="owl-carousel owl-theme">
                            @foreach ($categories as $key => $category)
                                <div id="tab-{{ $key + 1 }}" class="item {{ $key == 0 ? 'active' : '' }}">
                                    <h6>{{ $category->designation_fr }}</h6>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="restaurant-menu-content col-md-12">
                        @foreach ($categories as $key => $category)
                            <div id="tab-{{ $key + 1 }}-content" class="cont {{ $key == 0 ? 'active' : '' }}">
                                <div class="row">
                                    @foreach ($category->items->chunk(ceil($category->items->count() / 2)) as $chunk)
                                        <div class="col-md-5 {{ !$loop->first ? 'offset-md-2' : '' }}">
                                            @foreach ($chunk as $item)
                                                <div class="menu-info">
                                                    <h5>{{ $item->designation }} <span
                                                            class="price">{{ $item->price }} $</span></h5>
                                                    <p>{{ $item->designation }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
