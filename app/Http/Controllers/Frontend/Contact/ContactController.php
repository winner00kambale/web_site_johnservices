<?php

namespace App\Http\Controllers\Frontend\Contact;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Partenaire;
use App\Models\Temoignage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $phone = About::first();
        // $partenaire = Partenaire::inRandomOrder()->get();

        return view('webssite.contact.contactViewPage', compact('phone', ));
    }
}
