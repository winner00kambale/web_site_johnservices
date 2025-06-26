<?php

namespace App\Http\Controllers\Frontend\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\Slide_Restau;
use App\Models\Temoignage;

class RestauController extends Controller
{
    public function index()
    {
        $phone = About::first();
        $silde = Slide_Restau::inRandomOrder()->get();
        $restaurant = Restaurant::first();
        $temoignage = Temoignage::inRandomOrder()->get();
        $categories = Category::with('items')->get();

        return view('webssite.restaurant.restaurant', compact('phone', 'silde', 'restaurant', 'temoignage', 'categories'));
    }
}
