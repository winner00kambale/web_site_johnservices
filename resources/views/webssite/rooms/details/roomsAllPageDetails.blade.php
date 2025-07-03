<section class="rooms-page section-padding" data-scroll-index="1">
    <div class="container">
        <!-- project content -->
        <div class="row">
            <div class="col-md-12">
                <span>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                </span>
                <div class="section-subtitle">{{ $phone->Hotel_name }}</div>
                <div class="section-title"> CHAMBRE{{ $room->designation }}</div>
            </div>
            <div class="col-md-8">
                <h6 class="mb-30"> Prix : {{ $room->price }} $</h6>
                <p class="mb-30">{{ $room->shot_description_fr }}</p>
                <div class="row">
                    <div class="col-md-6">
                        <h6>Arrivée</h6>
                        <ul class="list-unstyled page-list mb-30">
                            <li>
                                <div class="page-list-icon"> <span class="ti-check"></span> </div>
                                <div class="page-list-text">
                                    <p>Arrivée à toute heure</p>
                                </div>
                            </li>
                            <li>
                                <div class="page-list-icon"> <span class="ti-check"></span> </div>
                                <div class="page-list-text">
                                    <p>Arrivée anticipée sous réserve de disponibilité</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6>Départ</h6>
                        <ul class="list-unstyled page-list mb-30">
                            <li>
                                <div class="page-list-icon"> <span class="ti-check"></span> </div>
                                <div class="page-list-text">
                                    <p>Départ avant midi</p>
                                </div>
                            </li>
                            <li>
                                <div class="page-list-icon"> <span class="ti-check"></span> </div>
                                <div class="page-list-text">
                                    <p>Départ express</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="butn-dark mt-15 mb-30"> <a href="https://wa.me/243997163443"
                                target="_blank"><span>Réservez
                                    maintenant</span></a> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 offset-md-1">
                <h6>Équipements</h6>
                <ul class="list-unstyled page-list mb-30">
                    <li>
                        <div class="page-list-icon"> <span class="flaticon-group"></span> </div>
                        <div class="page-list-text">
                            <p>1 Personne</p>
                        </div>
                    </li>
                    <li>
                        <div class="page-list-icon"> <span class="flaticon-wifi"></span> </div>
                        <div class="page-list-text">
                            <p>Wifi gratuit</p>
                        </div>
                    </li>

                    <li>
                        <div class="page-list-icon"> <span class="flaticon-breakfast"></span> </div>
                        <div class="page-list-text">
                            <p>Petit-déjeuner</p>
                        </div>
                    </li>
                    <li>
                        <div class="page-list-icon"> <span class="flaticon-towel"></span> </div>
                        <div class="page-list-text">
                            <p>Serviettes</p>
                        </div>
                    </li>
                    <li>
                        <div class="page-list-icon"> <span class="flaticon-tv"></span> </div>
                        <div class="page-list-text">
                            <p>TV</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
