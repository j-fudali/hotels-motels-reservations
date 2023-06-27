<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class GuestsReservation extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reservations = Reservation::whereHas('room', function ($q) {
            $q->whereHas('hotel', function ($query) {
                $query->where('user_id_user', Auth::id());
            });
        })->orderBy('ending_date', 'asc')->paginate(4);
        if ($request->ajax()) {
            return view('dashboard.guests-reservations.guests-reservations-results', ['reservations' => $reservations])->render();
        }
        return View::make('dashboard.guests-reservations.guests-reservations', ['reservations' => $reservations]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        if ((Carbon::parse($reservation->ending_date)->lt(Carbon::now())) && ($reservation->room->hotel->user_id_user == Auth::id())) {
            Room::find($reservation->room_id_room)->increment('number_of_rooms', 1);
            Reservation::destroy($reservation->id_reservation);
            return back()->with(['messages' => 'Udało ci się zakończyć rezerwacje']);
        }
        return redirect('/guests-reservations')->withErrors(['errors' => 'Nie możesz zakończyć rezerwacji']);
    }
}
