<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rooms = Room::where('number_of_rooms', '>', 0)->whereHas('hotel', function ($query) {
            $query->where('user_id_user', '!=', Auth::id());
        })->whereDoesntHave('users', function ($query) {
            $query->where('reservations.user_id_user', '=', Auth::id());
        });
        if (!empty($request['hotel_name'])) {
            $request->validate(['hotel_name' => 'max:60']);
            $rooms = $rooms->whereHas('hotel', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request['hotel_name'] . '%');
            });
        }
        if (!empty($request['number_of_people'])) {
            $request->validate([
                'number_of_people' => 'integer',
            ]);
            $rooms = $rooms->where('number_of_people', $request['number_of_people']);
        }
        if (!empty($request['country'])) {
            $request->validate(['country' => 'integer']);
            $rooms = $rooms->whereHas('hotel', function ($query) use ($request) {
                $query->where('countries_id_countries', $request['country']);
            });
        }
        if (!empty($request['province'])) {
            $request->validate(['province' => 'integer']);
            $rooms = $rooms->whereHas('hotel', function ($query) use ($request) {
                $query->where('provinces_id_provinces', $request['province']);
            });
        }
        if ($request->ajax()) {
            $rooms = $rooms->with(['images', 'hotel', 'hotel.province', 'hotel.country', 'users'])->orderBy('created_at', 'desc')->paginate(4);
            return view('dashboard.offers.offers-results', ['rooms' => $rooms])->render();
        }
        $rooms = $rooms->orderBy('cost_per_day', 'asc')->paginate(4);
        return view('dashboard.offers.offers', ['rooms' => $rooms])->render();
    }
    public function show(Request $request)
    {
        $roomId = $request->route('offer');
        $room = Room::find($roomId);
        return View::make('dashboard.room-details', ['room' => $room]);
    }
}
