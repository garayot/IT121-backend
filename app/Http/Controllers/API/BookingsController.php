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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(bookings $bookings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bookings $bookings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bookings $bookings)
    {
        //
    }
}
