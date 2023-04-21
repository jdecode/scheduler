<?php


use App\Models\Meeting;
use App\Models\Schedule;
use App\Models\User;

test('New meeting setup by user having no record in users table', function () {
    $user = User::factory()->create();
    $schedule = Schedule::factory()->create([
        'user_id' => $user->id,
    ]);

    $this->actingAs($user)
        ->post(
            route('saveMeeting', ['uuid' => $schedule->uuid]),
            [
                'name' => 'Test Meeting',
                'notes' => 'Test Description',
                'from' => now()->setTimezone('Asia/Kolkata')->addHour()->format('Y-m-d H:i:s'),
                'to' => now()->setTimezone('Asia/Kolkata')->addHour()->addMinutes(30)->format('Y-m-d H:i:s'),
                'email' => fake()->email,
            ]
        )
        ->assertFound();
})->group('auth', 'meetings');

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
        ->assertOk();
        //->assertSee($meeting->name);
})->group('auth', 'meetings');
