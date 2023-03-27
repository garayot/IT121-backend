<?php

namespace App\Http\Controllers\API;

use App\Models\bookings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\bookingsRequest;


class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return bookings::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(bookingsRequest $request)
    {
        $validated = $request->validated();

        $bookings = bookings::create($validated);

        return $bookings;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return bookings::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(bookingsRequest $request, string $id)
    {
        $validated = $request->validated();
        
        $bookings = bookings ::findOrFail($id);
        $bookings ->update($validated);

      return $bookings; 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bookings = bookings::findOrFail($id);
 
        $bookings->delete();

        return $bookings;

    }
}
