<?php

namespace Database\Seeders;
use App\Models\Donation;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DonationsTableSeeder extends Seeder
{
    public function run()
    {
        Donation::factory()->count(20)->create();

    }
}
