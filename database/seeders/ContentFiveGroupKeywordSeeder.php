<?php

namespace Database\Seeders;

use App\Models\Admin\ContentFiveGroupKeyword;
use Illuminate\Database\Seeder;

class ContentFiveGroupKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        ContentFiveGroupKeyword::create([
            'language_id' => 1,
            'add_work_item' => 'Add Work Item',
            'edit_work_item' => 'Edit Work Item',
            'work_items' => 'Work Items',
            'call_to_action' => 'Call To Action',
            'galleries' => 'Galleries',
            'add_gallery' => 'Add Gallery',
            'edit_gallery' => 'Edit Gallery',
            'monthly' => 'Monthly',
            'yearly' => 'Yearly',
            'languages' => 'Languages',
            'add_language' => 'Add Language',
            'edit_language' => 'Edit Language',
            'language_name' => 'Language Name',
            'language_code' => 'Language Code',
            'direction' => 'Direction',
            'keywords' => 'Keywords',
            'for_admin_panel' => 'For Admin Panel',
            'for_frontend' => 'For Frontend',
            'content_group' => 'Content Group',
            'menu' => 'Menu',
            'service_items' => 'Service Items',
            'external_url' => 'External Url',
            'socials' => 'Socials',
            'add_social' => 'Add Social',
            'edit_social' => 'Edit Social',
            'quick_access_buttons' => 'Quick Access Buttons',
            'email_or_phone' => 'Email Or Phone Number',
            'breadcrumb' => 'Breadcrumb',
            'color' => 'Color',
            'color_code' => 'Color Code',
            'ready_color_option' => 'Ready Color Option',
            'this_color_option_will_be_deleted' => 'This Color Option Will Be Deleted!',
        ]);
    }
}
