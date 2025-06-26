<?php

namespace App\Http\Controllers\Frontend\Gallery;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Gallery;
use App\Models\Partenaire;
use App\Models\Temoignage;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;

class GalleryController extends Controller
{
    public function index()
    {
        $phone = About::first();
        $gallery = Gallery::inRandomOrder()->get();
        $temoignage = Temoignage::inRandomOrder()->get();
        $partenaire = Partenaire::inRandomOrder()->get();

        return view('webssite.gallery.galleryView', compact('phone', 'gallery', 'temoignage', 'partenaire'));
    }
}
