<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        if (app()->runningUnitTests()) {
            Schedule::factory()->create(
                [
                    'user_id' => rand(1, User::max('id')),
                ]
            );
        }
    }
}
