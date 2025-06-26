<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-column footer-about">
                        <h3 class="footer-title">A propos de nous</h3>
                        <p class="footer-about-text">{{ Str::limit($phone->short_description_fr, 250) }}</p>
                        <div class="footer-language"> <i class="lni ti-world"></i>
                            <select onchange="location = this.value;">
                                <option value="http://duruthemes.com/">English</option>
                                <option value="http://duruthemes.com/">Francais</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 offset-md-1">
                    <div class="footer-column footer-explore clearfix">
                        <h3 class="footer-title">Menu</h3>
                        <ul class="footer-explore-list list-unstyled">
                            <li><a href="{{ '/' }}">Acceuil</a></li>
                            <li><a href="{{ route('about.controller') }}">A Propos de nous</a></li>
                            <li><a href="{{ route('room.controller') }}">Hébergement</a></li>
                            <li><a href="{{ route('restaurant.controller') }}">Restaurant</a></li>
                            <li><a href="{{ route('service.controller') }}">Services</a></li>
                            <li><a href="{{ route('gallery.controller') }}">Gallerie</a></li>
                            <li><a href="{{ route('event.controller') }}">Événements</a></li>
                            <li><a href="{{ route('contact.controller') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-column footer-contact">
                        <h3 class="footer-title">Contact</h3>
                        <p class="footer-contact-text">{{ $phone->adress_fr }}</p>
                        <div class="footer-contact-info">
                            <p class="footer-contact-phone"><span class="flaticon-call"></span> {{ $phone->phone }}</p>
                            <p class="footer-contact-mail">{{ $phone->email }}</p>
                        </div>
                        <div class="footer-about-social-list">
                            <a href="{{ $phone->instagram }}" target="_blank"><i class="ti-instagram"></i></a>
                            <a href="{{ $phone->twitter }}" target="_blank"><i class="ti-twitter"></i></a>
                            <a href="{{ $phone->youtube }}" target="_blank"><i class="ti-youtube"></i></a>
                            <a href="{{ $phone->facebook }}" target="_blank"><i class="ti-facebook"></i></a>
                            <a href="{{ $phone->linkedin }}" target="_blank"><i class="ti-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-bottom-inner">
                        <p class="footer-bottom-copy-right">© Copyright 2025 by <a href="#">Winner's Tech</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
