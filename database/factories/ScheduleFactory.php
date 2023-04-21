<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => rand(1, User::max('id')),
            'monday' => (bool) rand(0, 1),
            'tuesday' => (bool) rand(0, 1),
            'wednesday' => (bool) rand(0, 1),
            'thursday' => (bool) rand(0, 1),
            'friday' => (bool) rand(0, 1),
            'saturday' => false,
            'sunday' => false,
            'slot_size' => 30,
            'breaks' => '[]',
            'break_size' => 0,
            'break_start_time' => now()->setTimezone('UTC')->format('H:i:s'),
            'uuid' => Str::orderedUuid(),
            'active' => true,
            'deleted_at' => null,
            'availability_starts' => now()->setTimezone('UTC')->format('09:00:00'),
            'availability_ends' => now()->setTimezone('UTC')->format('17:00:00'),
            'random_string' => Str::random(32),
        ];
    }
}
