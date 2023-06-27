<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Room;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reservations = Reservation::where('user_id_user', Auth::id())->orderBy('reserved_at', 'desc')->paginate(4);
        if ($request->ajax()) {
            return view('dashboard.reservations.reservations-results', ['reservations' => $reservations])->render();
        }
        return View::make('dashboard.reservations.reservations', ['reservations' => $reservations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReservationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationRequest $request)
    {
        try {
            if (Carbon::parse($request['starting_date'])->lt(Carbon::parse($request['ending_date']))) {
                $room = Room::where('number_of_rooms', '>', 0)->where('id_room', $request['room_id_room'])->get();
                if ($room->isEmpty()) {
                    return back()->withErrors(['errors' => 'Nie można dokonać rezerwacji']);
                }
                $room->first()->update(['number_of_rooms' => $room->first()->number_of_rooms - 1]);
                $reservation = new Reservation(array_merge($request->validated(), ["user_id_user" => Auth::id()]));
                $reservation->save();
                return redirect('/reservations')->with(['messages' => 'Rezerwacja zaakceptowana']);
            }
            return back()->withErrors(['errors' => 'Data początku jest później niż data końca rezerwacji']);
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->withErrors(['errors', 'Nie można dokonać rezezrwacji']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        if (Carbon::parse($reservation->starting_date)->gt(Carbon::now()) && $reservation->user_id_user == Auth::id()) {
            Room::find($reservation->room_id_room)->increment('number_of_rooms', 1);
            Reservation::destroy($reservation->id_reservation);
            return redirect('/reservations')->with(['messages' => 'Udało się zakończyć rezerwacje']);
        }
        return back()->withErrors(['errors' => 'Nie możesz zakończyć rezerwacji']);
    }
}
