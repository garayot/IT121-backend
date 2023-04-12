<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\CarouselItems;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CarouselItemsRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        //
        // Retrieve the validated input data...
        $validated = $request->validated();

        $validated ['password'] = Hash::make($validated['password']);
        
        $user = User::create($validated);

        return $user;
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return User::findOrFail($id);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        //
        
        $user = User ::findOrFail($id);
        $validated = $request->validated();

        $user -> name = $validated['name'];
        $user ->save();

        return $user; 
    }
     /**
     * Update the email of the specified resource in storage.
     */
    public function email(UserRequest $request, string $id)
    {
        //
        $validated = $request->validated();
        
        $user = User ::findOrFail($id);
        $user ->update($validated);

      return $user; 
    }
     /**
     * Update the password of the specified resource in storage.
     */
    public function password(UserRequest $request, string $id)
    {
        //
        $validated = $request->validated();
        
        $user = User ::findOrFail($id);
        $user ->update($validated);

      return $user; 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
 
        $user->delete();

        return $user;
    }
}
