<?php

namespace Database\Seeders;

use App\Models\Disease;
use App\Models\District;
use App\Models\Patient;
use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::factory(10)->create();
        Patient::factory(10)->create();
        Region::factory(10)->create();
        District::factory(20)->create();
        Disease::factory(50)->create();
    }
}
