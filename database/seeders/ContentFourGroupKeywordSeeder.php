<?php

namespace Database\Seeders;

use App\Models\Admin\ContentFourGroupKeyword;
use Illuminate\Database\Seeder;

class ContentFourGroupKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        ContentFourGroupKeyword::create([
            'language_id' => 1,
            'tag' => 'Tag',
            'author' => 'Author',
            'category' => 'Category',
            'post_date' => 'Post Date',
            'view' => 'View',
            'homepage_versions' => 'Homepage Versions',
            'choose_version' => 'Choose Version',
            'map_iframe' => 'Map Iframe (link in src)',
            'map_iframe_desc_placeholder' => 'Please find your address on Google Map. And click the Share Button on the Left Side. You will see the Map Placement Area. In the Copy Html field in this section Copy and paste the link in the src from the code inside.',
            'contact' => 'Contact',
            'add_contact' => 'Add Contact',
            'edit_contact' => 'Edit Contact',
            'apps' => 'Apps',
            'add_app' => 'Add App',
            'edit_app' => 'Edit App',
            'site_images' => 'Site Images',
            'themes' => 'Themes',
            'choose_theme' => 'Choose Theme',
            'animated_desc' => 'Animated Description',
            'top_title' => 'Top Title',
            'skills' => 'Skills',
            'add_skill' => 'Add Skill',
            'edit_skill' => 'Edit Skill',
            'section_title' => 'Section Title',
            'percent_rate' => 'Percent Rate',
            'add_service_item' => 'Add Service Item',
            'edit_service_item' => 'Edit Service Item',
            'item' => 'Item',
            'works' => 'Works',
            'add_work' => 'Add Work',
            'edit_work' => 'Edit Work',
            'likes' => 'Likes',
        ]);
    }
}
