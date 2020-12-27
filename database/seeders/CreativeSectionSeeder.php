<?php

namespace Database\Seeders;

use App\Models\Admin\Creative\CreativeSection;
use Illuminate\Database\Seeder;

class CreativeSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        CreativeSection::create([
            'title' => 'Page Menu',
            'section' => 'page_menu',
            'status' => 1
        ]);

        // Create datas
        CreativeSection::create([
            'title' => 'About Section',
            'section' => 'about_section',
            'status' => 1
        ]);

        // Create datas
        CreativeSection::create([
            'title' => 'Skill Section',
            'section' => 'skill_section',
            'status' => 1
        ]);

        // Create datas
        CreativeSection::create([
            'title' => 'Counter Section',
            'section' => 'counter_section',
            'status' => 1
        ]);

        // Create datas
        CreativeSection::create([
            'title' => 'Service Section',
            'section' => 'service_section',
            'status' => 1
        ]);

        // Create datas
        CreativeSection::create([
            'title' => 'Work Section',
            'section' => 'work_section',
            'status' => 1
        ]);

        // Create datas
        CreativeSection::create([
            'title' => 'Call To Action Section',
            'section' => 'call_to_action_section',
            'status' => 1
        ]);

        // Create datas
        CreativeSection::create([
            'title' => 'Client Section',
            'section' => 'client_section',
            'status' => 1
        ]);

        // Create datas
        CreativeSection::create([
            'title' => 'Review Section',
            'section' => 'review_section',
            'status' => 1
        ]);

        // Create datas
        CreativeSection::create([
            'title' => 'Gallery Section',
            'section' => 'gallery_section',
            'status' => 1
        ]);

        // Create datas
        CreativeSection::create([
            'title' => 'Team Section',
            'section' => 'team_section',
            'status' => 1
        ]);

        // Create datas
        CreativeSection::create([
            'title' => 'Price Section',
            'section' => 'price_section',
            'status' => 1
        ]);

        // Create datas
        CreativeSection::create([
            'title' => 'Blog Section',
            'section' => 'blog_section',
            'status' => 1
        ]);

        // Create datas
        CreativeSection::create([
            'title' => 'Contact Section',
            'section' => 'contact_section',
            'status' => 1
        ]);

        // Create datas
        CreativeSection::create([
            'title' => 'Footer Section',
            'section' => 'footer_section',
            'status' => 1
        ]);

        // Create datas
        CreativeSection::create([
            'title' => 'Preloader',
            'section' => 'preloader',
            'status' => 1
        ]);

    }
}
