<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMeetingRequest;
use App\Models\Schedule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MeetingController extends Controller
{
    public function myMeetings(): View
    {
        $meetings = Auth::user()->meetings()->get()->toArray();
        return view('pages.meetings', compact('meetings'));
    }

    public function connectWithMe(String $uuid): View
    {
        $schedule = Schedule::query()
            ->where('uuid', $uuid)
            ->with('user')
            ->firstOrFail();
        return view('pages.connect-with-me', compact('schedule'));
    }

    public function saveMeeting(StoreMeetingRequest $request, String $uuid): RedirectResponse|JsonResponse
    {
        $schedule = Schedule::query()
            ->where('uuid', $uuid)
            ->with('user')
            ->firstOrFail();

        $meeting = $schedule->meetings()->create([
            'user_id' => Auth::id(),
            'schedule_id' => $schedule->id,
            'date' => $request->get('date'),
            'time' => $request->get('time'),
            'duration' => $request->get('duration'),
        ]);

        return response()->json([
            'message' => 'Meeting created successfully',
            'meeting' => $meeting,
        ]);
    }
}
