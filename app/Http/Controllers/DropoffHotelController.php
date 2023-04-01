<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Destination;
use App\Models\DropoffHotel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DropoffHotelStoreRequest;
use App\Http\Requests\DropoffHotelUpdateRequest;

class DropoffHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

        $dropoffHotels = DropoffHotel::all();

        return view(
            'hotels.dropoffHotel',
            compact('dropoffHotels')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', DropoffHotel::class);

        $destinations = Destination::pluck('name', 'id');

        return view('app.dropoff_hotels.create', compact('destinations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DropoffHotelStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', DropoffHotel::class);

        $validated = $request->validated();

        $dropoffHotel = DropoffHotel::create($validated);

        return redirect()
            ->route('dropoff-hotels.edit', $dropoffHotel)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, DropoffHotel $dropoffHotel): View
    {
        $this->authorize('view', $dropoffHotel);

        return view('app.dropoff_hotels.show', compact('dropoffHotel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, DropoffHotel $dropoffHotel): View
    {
        $this->authorize('update', $dropoffHotel);

        $destinations = Destination::pluck('name', 'id');

        return view(
            'app.dropoff_hotels.edit',
            compact('dropoffHotel', 'destinations')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        DropoffHotelUpdateRequest $request,
        DropoffHotel $dropoffHotel
    ): RedirectResponse {
        $this->authorize('update', $dropoffHotel);

        $validated = $request->validated();

        $dropoffHotel->update($validated);

        return redirect()
            ->route('dropoff-hotels.edit', $dropoffHotel)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        DropoffHotel $dropoffHotel
    ): RedirectResponse {
        $this->authorize('delete', $dropoffHotel);

        $dropoffHotel->delete();

        return redirect()
            ->route('dropoff-hotels.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
