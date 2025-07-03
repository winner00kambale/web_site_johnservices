<?php

namespace App\Http\Controllers\Frontend\Room;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Chambre;
use App\Models\Partenaire;
use App\Models\SlideRooms;
use App\Models\Temoignage;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $phone = About::first();
        $rooms = Chambre::all();

        return view('webssite.rooms.roomView', compact('phone', 'rooms'));
    }

    public function getSlideRoom($id)
    {
        $phone = About::first();
        $slideRoom = SlideRooms::inRandomOrder()->get();
        $room = Chambre::find($id);
        return view('webssite.rooms.room-details', compact('phone', 'slideRoom', 'room'));
    }

    public function roomDetails()
    {
        $id = request('id');
        $phone = About::first();
        $room = Chambre::find($id);
        $temoignage = Temoignage::inRandomOrder()->get();
        $partenaire = Partenaire::inRandomOrder()->get();

        if (!$room) {
            abort(404);
        }

        $designation = $room->designation;

        if ($designation === 'VIP') {
            return view('webssite.rooms.details.vipDetails', compact('phone', 'room', 'temoignage', 'partenaire'));
        } elseif ($designation === 'DELUXE') {
            return view('webssite.rooms.details.deluxeDetails', compact('phone', 'room', 'temoignage', 'partenaire'));
        } else {
            return view('webssite.rooms.details.standardDetails', compact('phone', 'room', 'temoignage', 'partenaire'));
        }
    }
}
