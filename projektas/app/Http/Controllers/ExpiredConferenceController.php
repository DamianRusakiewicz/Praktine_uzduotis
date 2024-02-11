<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;

class ExpiredConferenceController extends Controller
{
    public function showExpiredConferences()
    {
        // Logic to retrieve expired conferences
        $expiredConferences = Conference::where('expired', true)
            ->orWhere('created_at', '<', now()->subDays(30))
            ->get();

        // Pass the $expiredConferences variable to the view
        return view('expired-conferences', compact('expiredConferences'));
    }

}
