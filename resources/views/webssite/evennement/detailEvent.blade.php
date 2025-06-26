@extends('webssite.home.master')
@section('contenu')
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4"
        data-background="{{ asset('img/banner.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-90">
                    <h5>{{ $phone->Hotel_name }}</h5>
                    <h1>Detail</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <img src="{{ asset('storage/' . $news->image) }}" class="mb-30" alt="">
                    <h2>{{ $news->title_fr }}</h2>
                    <p>{{ $news->description_fr }}</p>
                </div>
                <!-- Sidebar -->
                <div class="col-md-4">
                    <div class="news2-sidebar row">
                        <div class="col-md-12">
                            <div class="widget search">
                                <form>
                                    <input type="text" name="search" placeholder="Type here ...">
                                    <button type="submit"><i class="ti-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="widget">
                                <div class="widget-title">
                                    <h6>Evennements Recents</h6>
                                </div>
                                <ul class="recent">
                                    @foreach ($treenews as $item)
                                        <li>
                                            <div class="thum"> <img src="{{ asset('storage/' . $item->image) }}"
                                                    alt=""> </div>
                                            <a href="#">{{ $item->title_fr }}</a>
                                            <form action="{{ route('detail.event') }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <div class="text-end">
                                                    <button type="submit"
                                                        class="btn btn-link p-0 m-0 text-decoration-none d-inline-flex align-items-center gap-2 btn-custom-green">
                                                        Voir plus <i class="ri-arrow-right-line"></i>
                                                    </button>

                                                </div>
                                            </form>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer
@endsection
