<?php

namespace App\Http\Controllers\Frontend\Room;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Chambre;
use App\Models\SlideRooms;
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
}
