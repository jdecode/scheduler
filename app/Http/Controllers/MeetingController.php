<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MeetingController extends Controller
{
    public function myMeetings(): View
    {
        $meetings = Auth::user()->meetings()->get()->toArray();
        return view('pages.meetings', compact('meetings'));
    }
}
