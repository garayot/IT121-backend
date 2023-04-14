<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Messages;
use App\Http\Requests\messageRequest;



class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Messages::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(messageRequest $request)
    {
        $validated = $request->validated();
        
        $message = Messages::create($validated);

        return $message;    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Messages::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(messageRequest $request, string $id)
    {
        $validated = $request->validated();

        $message = Messages::findOrFail($id);
        $message -> update($validated);

        return $message; 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = messages::findOrFail($id);
 
        $message->delete();

        return $message;
    }
}
