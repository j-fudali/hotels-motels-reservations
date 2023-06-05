<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('dashboard.hotels');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $hotel = new Hotel(array_merge($validated, [
            'image' => $path,
            'user_id_user' => Auth::id()
        ]));
        $hotel->save();
        return redirect('/hotels');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
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
        if (file_exists(public_path('storage/' . $hotel->image))) {
            unlink(public_path('storage/' . $hotel->image));
        }
        Hotel::destroy($hotel->id_hotel);
        return back()->with(['messages' => 'Hotel został usunięty']);
    }
}
