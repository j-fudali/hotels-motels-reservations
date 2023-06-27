<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hotels = Hotel::where('user_id_user', Auth::id())->orderBy('name')->paginate(6);
        if ($request->ajax()) {
            return view('dashboard.hotels.hotels-results', ['hotels' => $hotels])->render();
        }
        return View::make('dashboard.hotels.hotels', ['hotels' => $hotels]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHotelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHotelRequest $request)
    {

        $validated = $request->validated();
        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
        }
        $hotel = new Hotel([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'image' => $path,
            'countries_id_countries' => $validated['country'],
            'provinces_id_provinces' => $validated['province'],
            'user_id_user' => Auth::id()
        ]);
        $hotel->save();
        return redirect('/hotels/' . $hotel->id_hotel . '/rooms')->with(['messages' => 'Utworzyłeś nowy hotel. Teraz dodaj do niego pokoje']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHotelRequest  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {
        $path = $hotel->image;
        if ($request->hasFile('image')) {
            unlink(public_path('storage/' . $hotel->image));
            $path = $request->file('image')->store('images', 'public');
        }
        $hotel = Hotel::where('id_hotel', $hotel->id_hotel)->update(array_merge($request->validated(), ['image' => $path]));
        return back()->with(['messages' => 'Hotel został zaaktualizowany']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        if (count($hotel->rooms()->get()) > 0) {
            return back()->withErrors(['errors' => 'Nie można usunąć hotelu dopóki posiada on przypisane pokoje']);
        }
        if (file_exists(public_path('storage/' . $hotel->image))) {
            unlink(public_path('storage/' . $hotel->image));
        }
        Hotel::destroy($hotel->id_hotel);
        return redirect('/hotels')->with(['messages' => 'Hotel został usunięty']);
    }
}
