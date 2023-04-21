<?php

namespace Database\Seeders;

use App\Models\Meeting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeetingSeeder extends Seeder
{
    public function run(): void
    {
        if (app()->runningUnitTests()) {
            Meeting::factory()->create();
        }
    }
}
