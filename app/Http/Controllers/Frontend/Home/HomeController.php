<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Chambre;
use App\Models\Gallery;
use App\Models\News;
use App\Models\OtherService;
use App\Models\Partenaire;
use App\Models\Service;
use App\Models\Slide;
use App\Models\Temoignage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slide = Slide::inRandomOrder()->get();
        $phone = About::first();
        $gallery = Gallery::inRandomOrder()->take(3)->get();
        $rooms = Chambre::latest()->get();
        $data = Service::inRandomOrder()->get();
        $otherService = OtherService::inRandomOrder()->get();
        $temoignage = Temoignage::inRandomOrder()->get();
        $news = News::inRandomOrder()->take(3)->get();
        $partenaire = Partenaire::inRandomOrder()->get();

        return view('webssite.home.index', compact('slide', 'phone', 'gallery', 'rooms', 'data', 'otherService', 'temoignage', 'news', 'partenaire'));
    }
}
