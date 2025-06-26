<?php

namespace App\Http\Controllers\Frontend\Service;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Partenaire;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $phone = About::first();
        $data = Service::inRandomOrder()->get();
        $partenaire = Partenaire::inRandomOrder()->get();

        return view('webssite.services.serviceView', compact('phone', 'data', 'partenaire'));
    }
}
