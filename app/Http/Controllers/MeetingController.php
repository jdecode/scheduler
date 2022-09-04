<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MeetingController extends Controller
{
    public function myMeetings(): View
    {
        $meetings = Auth::user()->meetings()->get()->toArray();
        return view('pages.meetings', compact('meetings'));
    }

    public function connectWithMe($uuid): View
    {
        $schedule = Schedule::query()
            ->where('uuid', $uuid)
            ->with('user')
            ->firstOrFail();
        return view('pages.connect-with-me', compact('schedule'));
    }

    public function saveMeeting()
    {
    }
}
