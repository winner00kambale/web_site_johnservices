<section class="services section-padding">
    <div class="container">
        @foreach ($data as $index => $service)
            <div class="row">
                @if ($index % 2 === 0)
                    <div class="col-md-6 p-0 animate-box" data-animate-effect="fadeInLeft">
                        <div class="img left">
                            <a href="{{ $service->link ?? '#' }}">
                                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 p-0 bg-cream valign animate-box" data-animate-effect="fadeInRight">
                        <div class="content">
                            <div class="cont text-left">
                                <div class="info">
                                </div>
                                <h4>{{ $service->title_fr }}</h4>
                                <p>{{ $service->description_fr }}</p>
                                <div class="butn-dark">
                                    {{-- <a href="{{ $service->link ?? '#' }}"><span>voir plus</span></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- Image à droite --}}
                    <div class="col-md-6 bg-cream p-0 order2 valign animate-box" data-animate-effect="fadeInLeft">
                        <div class="content">
                            <div class="cont text-left">
                                <div class="info">
                                </div>
                                <h4>{{ $service->title_fr }}</h4>
                                <p>{{ Str::limit($service->description_fr, 250) }}</p>
                                <div class="butn-dark">
                                    {{-- <a href="{{ $service->link ?? '#' }}"><span>voir plus</span></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-0 order1 animate-box" data-animate-effect="fadeInRight">
                        <div class="img">
                            <a href="{{ $service->link ?? '#' }}">
                                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}">
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</section>
