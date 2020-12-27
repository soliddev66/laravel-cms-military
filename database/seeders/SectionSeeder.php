<?php

namespace Database\Seeders;

use App\Models\Admin\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        Section::create([
            'title' => 'Page Menu',
            'section' => 'page_menu',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'About Section',
            'section' => 'about_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Service Section',
            'section' => 'service_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Feature Section',
            'section' => 'feature_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Counter Section',
            'section' => 'counter_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'How To Install Section',
            'section' => 'install_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Screenshot Section',
            'section' => 'screenshot_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Price Section',
            'section' => 'price_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Client Section',
            'section' => 'client_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Team Section',
            'section' => 'team_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Faq Section',
            'section' => 'faq_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Blog Section',
            'section' => 'blog_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Contact Section',
            'section' => 'contact_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'App Section',
            'section' => 'app_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Footer Section',
            'section' => 'footer_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Preloader',
            'section' => 'preloader',
            'status' => 1
        ]);

    }
}
