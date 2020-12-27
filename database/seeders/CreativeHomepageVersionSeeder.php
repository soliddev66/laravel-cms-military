<?php

namespace Database\Seeders;

use App\Models\Admin\Creative\CreativeHomepageVersion;
use Illuminate\Database\Seeder;

class CreativeHomepageVersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        CreativeHomepageVersion::create([
            'choose_version' => 0,
            'color' => 0,
        ]);
    }
}
