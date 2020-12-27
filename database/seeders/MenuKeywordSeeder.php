<?php

namespace Database\Seeders;

use App\Models\Admin\MenuKeyword;
use Illuminate\Database\Seeder;

class MenuKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        MenuKeyword::create([
            'language_id' => 1,
            'banner' => 'Banner',
            'fixed_content' => 'Fixed Content',
            'background_image' => 'Background Image',
            'sliders' => 'Sliders',
            'video' => 'Video',
            'about' => 'About',
            'services' => 'Services',
            'features' => 'Features',
            'counters' => 'Counters',
            'how_to_install' => 'How To Install?',
            'screenshots' => 'Screenshots',
            'prices' => 'Prices',
            'teams' => 'Teams',
            'faqs' => 'Faqs',
            'site_info' => 'Site Info',
            'site_images' => 'Site Images',
            'homepage_versions' => 'Homepage Versions',
            'google_analytic' => 'Google Analytic',
            'sections' => 'Sections',
            'color' => 'Color',
            'seo' => 'Seo',
            'categories' => 'Categories',
            'blogs' => 'Blogs',
            'contact' => 'Contact',
            'contact_info' => 'Contact Info',
            'apps' => 'Apps',
            'settings' => 'Settings',
            'themes' => 'Themes',
            'languages' => 'Languages',
            'logout' => 'Sign Out',
            'skills' => 'Skills',
            'works' => 'Works',
            'call_to_action' => 'Call To Action',
            'galleries' => 'Galleries',
            'external_url' => 'External Url',
            'socials' => 'Socials',
            'quick_access_buttons' => 'Quick Access Buttons',
            'breadcrumb' => 'Breadcrumb',
            'pages' => 'Pages',
            'messages' => 'Messages',
            'testimonials' => 'Testimonials',
            'notifications' => 'Notifications',
            'profile' => 'Profile',
            'change_password' => 'Change Password',
            'data_language' => 'Data Language',
            'dashboard' => 'Dashboard',
            'optimizer' => 'Optimizer',
            'user_management' => 'User Management',
        ]);
    }
}
