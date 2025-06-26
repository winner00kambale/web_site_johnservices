<?php

namespace App\Http\Controllers\Frontend\Event;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\News;
use App\Models\Partenaire;
use App\Models\Temoignage;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class EventController extends Controller
{
    public function index()
    {
        $phone = About::first();
        $news = News::inRandomOrder()->get();
        $temoignage = Temoignage::inRandomOrder()->get();
        $partenaire = Partenaire::inRandomOrder()->get();

        return view('webssite.evennement.events', compact('phone', 'news', 'temoignage', 'partenaire'));
    }

    public function getNew()
    {
        $id = request('id');
        $phone = About::first();
        $news = News::find($id);
        $treenews = News::inRandomOrder()->take(3)->get();
        return view('webssite.evennement.detailEvent', compact('news', 'phone', 'treenews'));
    }
}
