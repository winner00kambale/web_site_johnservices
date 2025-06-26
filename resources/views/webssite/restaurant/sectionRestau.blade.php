<section class="rooms-page section-padding" data-scroll-index="1">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left">
                <span>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                    <i class="star-rating"></i>
                </span>
                <div class="section-subtitle">Une aventure des sens</div>
                <div class="section-title">{{ $restaurant->title_fr }}</div>
            </div>
            <div class="col-md-12">
                <p class="mb-30">{{ $restaurant->description_fr }}</p>
                <h6>Notre Horaire</h6>
                <ul class="list-unstyled page-list mb-30">
                    <li>
                        <div class="page-list-icon"> <span class="ti-time"></span> </div>
                        <div class="page-list-text">
                            <p>{{ $restaurant->horaire }} (Tous les jours)</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
