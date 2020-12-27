<?php

namespace Database\Seeders;

use App\Models\Admin\ContentTwoGroupKeyword;
use Illuminate\Database\Seeder;

class ContentTwoGroupKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        ContentTwoGroupKeyword::create([
            'language_id' => 1,
            'services' => 'Services',
            'add_service' => 'Add Service',
            'edit_service' => 'Edit Service',
            'icon' => 'Icon',
            'section_title_and_desc' => 'Section Title/Description',
            'features' => 'Features',
            'add_feature' => 'Add Feature',
            'edit_feature' => 'Edit Feature',
            'add_counter' => 'Add Counter',
            'edit_counter' => 'Edit Counter',
            'timer' => 'Timer',
            'counters' => 'Counters',
            'how_to_install' => 'How To Install',
            'add_how_to_install' => 'Add How To Install',
            'video_link' => 'Video Link',
            'edit_how_to_install' => 'Edit How To Install',
            'screenshots' => 'Screenshots',
            'add_screenshot' => 'Add Screenshot',
            'edit_screenshot' => 'Edit Screenshot',
            'prices' => 'Prices',
            'add_price' => 'Add Price',
            'edit_price' => 'Edit Price',
            'currency' => 'Currency ',
            'price' => 'Price',
            'time' => 'Time',
            'badge' => 'Badge',
            'please_take_with_features_semicolon' => 'Please take with features semicolon(;).',
            'teams' => 'Teams',
            'add_team' => 'Add Team',
            'edit_team' => 'Edit Team',
            'name' => 'Name',
            'job' => 'Job',
        ]);
    }
}
