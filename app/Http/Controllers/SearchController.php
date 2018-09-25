<?php

namespace App\Http\Controllers;
use App\User;
use app\
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function filter(Request $request, User $user)
    {
          // Search for a user based on their name.
    if ($request->has('name')) {
        return $user->where('name', $request->input('name'))->get();
    }

    // Search for a user based on their company.
    if ($request->has('company')) {
        return $user->where('company', $request->input('company'))
            ->get();
    }

    // Search for a user based on their city.
    if ($request->has('city')) {
        return $user->where('city', $request->input('city'))->get();
    }

    // Continue for all of the filters.

    // No filters have been provided, so
    // let's return all users. This is
    // bad - we should paginate in
    // reality.
    return User::all();
} 
    }
}