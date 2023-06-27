<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Hotel;
use App\Models\RoomImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Hotel $hotel)
    {
        $rooms = Hotel::find($hotel->id_hotel)->rooms()->orderBy('created_at', 'desc')->paginate(6);
        if ($request->ajax()) {
            return view('dashboard.rooms.rooms-results', ['hotel' => $hotel, 'rooms' => $rooms]);
        }
        return View::make('dashboard.rooms.rooms', ['hotel' => $hotel, 'rooms' => $rooms]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request, Hotel $hotel)
    {
        $room = new Room;
        $room->number_of_people = $request->validated()['number_of_people'];
        $room->description = $request->validated()['description'];
        $room->cost_per_day = $request->validated()['cost_per_day'];
        $room->number_of_rooms = $request->validated()['number_of_rooms'];
        $room->hotel_id_hotel = $hotel->id_hotel;
        $room->save();
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $room_image = new RoomImage(['path' => $path, 'room_id_room' => $room->id_room]);
                $room_image->save();
            }
        }
        return redirect('/offers/' . $room->id_room)->with(['messages' => 'Pokój został utworzony']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoomRequest  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        if ($request->hasFile('images')) {
            foreach ($room->images()->get() as $last_image) {
                RoomImage::destroy($last_image->id_room_image);
                if (file_exists(public_path('storage/' . $last_image->path))) {
                    unlink(public_path('storage/' . $last_image->path));
                }
            }
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $room_image = new RoomImage(['path' => $path, 'room_id_room' => $room->id_room]);
                $room_image->save();
            }
        }
        $room = Room::find($room->id_room);
        $room->description = $request->validated()['description'];
        $room->save();
        return back()->with(['messages' => 'Udało się zaktualizować pokój!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        if ($room->existInReservation()) {
            return back()->withErrors(['errors' => 'Nie można usunąć pokoju']);
        }
        foreach ($room->images()->get() as $last_image) {
            if (file_exists(public_path('storage/' . $last_image->path))) {
                unlink(public_path('storage/' . $last_image->path));
            }
        }
        Room::destroy($room->id_room);
        return redirect('/hotels/' . $room->hotel->id_hotel . '/rooms')->with(['messages' => 'Udało ci się usunąć pokój']);
    }
}
