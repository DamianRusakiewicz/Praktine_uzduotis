<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConferenceRegistration;
use App\Models\Conference;

class ConferenceRegistrationController extends Controller
{

    public function register(Request $request, $conferenceId)
    {
        $userId = auth()->id();

        $existingRegistration = ConferenceRegistration::where('user_id', $userId)
            ->where('conference_id', $conferenceId)
            ->first();

        if ($existingRegistration) {
            return redirect()->back()->with('error', 'You are already registered for this conference.');
        }

        ConferenceRegistration::create([
            'user_id' => $userId,
            'conference_id' => $conferenceId,
        ]);

        return redirect()->route('conferences.index')->with('success', 'You have successfully registered for the conference');
    }

    public function review($conferenceId)
    {
        $conference = Conference::findOrFail($conferenceId);

        $registrations = ConferenceRegistration::where('conference_id', $conferenceId)
            ->with(['user' => function($query) {
                $query->select('id', 'name', 'email');
            }])
            ->get();

        return view('review-conference', compact('conference', 'registrations'));
    }

    public function unregister($registrationId)
    {
        $registration = ConferenceRegistration::findOrFail($registrationId);

        if ($registration->user_id !== auth()->id()) {
            return back()->with('error', 'You are not authorized to perform this action.');
        }

        // Delete
        $registration->delete();

        return redirect()->back()->with('success', 'You have successfully unregistered from the conference.');
    }


}
