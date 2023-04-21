<?php

namespace Database\Factories;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meeting>
 */
class MeetingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $next_weekday = now()->nextWeekday();
        return [
            'user_id' => rand(1, User::max('id')),
            'schedule_id' => rand(1, Schedule::max('id')),
            'from' => $next_weekday->format('Y-m-d 09:00:00'),
            'to' => $next_weekday->format('Y-m-d 17:00:00'),
            'active' => true,
            'name' => 'Test Meeting',
            'email' => fake()->safeEmail,
            'notes' => 'Test Notes',
            'deleted_at' => null,
        ];
    }
}
