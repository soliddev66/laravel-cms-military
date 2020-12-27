<?php

namespace Database\Seeders;

use App\Models\Admin\Theme;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        Theme::create([
            'choose_theme' => 0,
        ]);
    }
}
