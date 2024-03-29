<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        // Add validation if required
        return User::create($request->all());
    }

    public function show(User $user)
    {
        return $user;
    }

    public function update(Request $request, User $user)
    {
        // Add validation if required
        $user->update($request->all());

        return $user;
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
