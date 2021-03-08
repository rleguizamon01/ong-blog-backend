<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Volunteer;

class VolunteerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Volunteer::factory(20)->create();
    }
}
