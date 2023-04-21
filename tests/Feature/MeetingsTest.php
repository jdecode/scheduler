<?php


use App\Models\Meeting;
use App\Models\Schedule;
use App\Models\User;

test('Logged in user can see own meetings', function () {
    $user = User::factory()->create();
    Schedule::create([
        'user_id' => $user->id,
    ]);
    $meeting = Meeting::factory()->create([
        'user_id' => $user->id,
    ]);

    $this->actingAs($user)
        ->get(route('myMeetings'))
        ->assertSee($meeting->name);
})->group('auth', 'meetings');
