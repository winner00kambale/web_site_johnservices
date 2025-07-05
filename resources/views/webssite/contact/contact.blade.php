<section class="contact section-padding">
    <div class="container">
        <div class="row mb-90">
            <div class="col-md-6 mb-60">
                <h3>{{ $phone->Hotel_name }}</h3>
                <p>{{ Str::limit($phone->short_description_fr, 250) }}</p>
                <div class="reservations mb-30">
                    <div class="icon"><span class="flaticon-call"></span></div>
                    <div class="text">
                        <p>Reservation</p> <a href="tel:855-100-4444">{{ $phone->phone }}</a>
                    </div>
                </div>
                <div class="reservations mb-30">
                    <div class="icon"><span class="flaticon-envelope"></span></div>
                    <div class="text">
                        <p>Email </p> <a href="mailto:{{ $phone->email }}">{{ $phone->email }}</a>
                    </div>
                </div>
                <div class="reservations">
                    <div class="icon"><span class="flaticon-location-pin"></span></div>
                    <div class="text">
                        <p>{{ $phone->adress_fr }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-30 offset-md-1" id="app">

            </div>

            @vite(['resources/css/app.css', 'resources/js/app.js'])
        </div>
        <!-- Map Section -->
        <div class="row">
            <div class="col-md-12 map animate-box" data-animate-effect="fadeInUp">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1573147.7480448114!2d-74.84628175962355!3d41.04009641088412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25856139b3d33%3A0xb2739f33610a08ee!2s1616%20Broadway%2C%20New%20York%2C%20NY%2010019%2C%20Amerika%20Birle%C5%9Fik%20Devletleri!5e0!3m2!1str!2str!4v1646760525018!5m2!1str!2str"
                    width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>
