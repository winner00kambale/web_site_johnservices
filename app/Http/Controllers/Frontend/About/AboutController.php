<?php

namespace App\Http\Controllers\Frontend\About;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Service;
use App\Models\Team;
use App\Models\Temoignage;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $phone = About::first();
        $data = Service::inRandomOrder()->get();
        $team = Team::all();
        $temoignage = Temoignage::inRandomOrder()->get();

        return view('webssite.about.aboutView', compact('phone', 'data', 'team', 'temoignage'));
    }
}
