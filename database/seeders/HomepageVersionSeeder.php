<?php

namespace Database\Seeders;

use App\Models\Admin\HomepageVersion;
use Illuminate\Database\Seeder;

class HomepageVersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        HomepageVersion::create([
            'choose_version' => 0,
            'color' => 0,
        ]);
    }
}
