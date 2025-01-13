<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Academician;
use App\Models\Grant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user(); // Get the currently authenticated user

        // Fetch academician details for academician users
        $academician = null;
        $grants = collect();
        if ($user->userCategory == 'academician') {
            $academician = Academician::where('name', $user->name)->first();

            // Get grants where the user is the project leader
            if ($academician) {
                $grants = $academician->grants()
                    ->wherePivot('role', 'Leader')
                    ->get();
            }
        }

        return view('profile', compact('user', 'academician', 'grants'));
    }
}
