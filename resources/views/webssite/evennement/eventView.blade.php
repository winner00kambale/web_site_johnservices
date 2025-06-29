<section class="news section-padding bg-blck">
    @php
        use Carbon\Carbon;
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle"><span>Actualites Recentes</span></div>
                <div class="section-title"><span>Nos événements</span></div>
            </div>
        </div>
        <p>Le GuestHouse John Services Motel accueille vos événements dans un cadre chaleureux et discret. Que ce
            soit pour des réunions, séminaires, anniversaires ou petites célébrations, notre espace s’adapte à vos
            besoins avec un service personnalisé et une ambiance conviviale.
            Nous mettons à votre disposition une salle équipée, un service traiteur sur demande, ainsi qu’une équipe
            attentive pour vous accompagner.
            Faites de chaque moment un souvenir inoubliable, en toute simplicité et confort.</p>
        <div class="row">
            @foreach ($news as $item)
                @php
                    $date = Carbon::parse($item->date);
                @endphp
                <div class="col-md-4 mb-30">
                    <div class="item">
                        <div class="position-re o-hidden"> <img src="{{ asset('storage/' . $item->image) }}"
                                alt="">
                            <div class="date">
                                <a href="#"> <span>{{ $date->format('M') }}</span>
                                    <i>{{ $date->format('d') }}</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                            </span>
                            @php
                                $date = Carbon::parse($item->date);
                            @endphp
                            <h5>{{ $item->title_fr }}</h5>
                            <form action="{{ route('detail.event') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <div class="text-end">
                                    <button type="submit"
                                        class="btn btn-link p-0 m-0 text-decoration-none d-inline-flex align-items-center gap-2 btn-custom-green">
                                        Voir plus <i class="ri-arrow-right-line"></i>
                                    </button>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
