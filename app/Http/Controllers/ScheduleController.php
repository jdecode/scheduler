<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    public function mySchedule(): View
    {
        $user = Auth::user();
        $schedule = $user->schedule;
        $days = [
            'monday' => $schedule->monday,
            'tuesday' => $schedule->tuesday,
            'wednesday' => $schedule->wednesday,
            'thursday' => $schedule->thursday,
            'friday' => $schedule->friday,
            'saturday' => $schedule->saturday,
            'sunday' => $schedule->sunday,
        ];
        return view('schedules.my', ['days' => $days, 'schedule' => $schedule]);
    }

    public function saveSchedule(): RedirectResponse
    {
        $days = [
            'monday' => 0,
            'tuesday' => 0,
            'wednesday' => 0,
            'thursday' => 0,
            'friday' => 0,
            'saturday' => 0,
            'sunday' => 0,
        ];

        $updated_days = request()->all('days');
        $schedule = request()->all('availability_starts', 'availability_ends', 'slot_size');
        $schedule['monday'] = 0;
        $schedule['tuesday'] = 0;
        $schedule['wednesday'] = 0;
        $schedule['thursday'] = 0;
        $schedule['friday'] = 0;
        $schedule['saturday'] = 0;
        $schedule['sunday'] = 0;

        $schedule['availability_starts'] = $schedule['availability_starts'] . ':00:00';
        $schedule['availability_ends'] = $schedule['availability_ends'] . ':00:00';

        foreach ($updated_days['days'] as $day => $value) {
            if (isset($days[$day])) {
                $days[$day] = 1;
                $schedule[$day] = 1;
                continue;
            }
            $schedule[$day] = 0;
        }
        DB::table('schedules')
            ->where('user_id', Auth::id())
            ->update($schedule);
        return redirect()->route('mySchedule');
    }
}
