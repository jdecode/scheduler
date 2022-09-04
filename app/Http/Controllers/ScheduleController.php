<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    public function index(): View
    {
        $schedules = Auth::user()->schedules()->get()->toArray();
        return view('pages.schedules', compact('schedules'));
    }
}
