<?php

namespace Database\Seeders;

use App\Models\Admin\ContentThreeGroupKeyword;
use Illuminate\Database\Seeder;

class ContentThreeGroupKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        ContentThreeGroupKeyword::create([
            'language_id' => 1,
            'link' => 'Link',
            'faqs' => 'Faqs',
            'add_faq' => 'Add Faq',
            'edit_faq' => 'Edit Faq',
            'question' => 'Question',
            'answer' => 'Answer',
            'site_info' => 'Site Info',
            'copyright' => 'Copyright',
            'favicon_image' => 'Favicon',
            'admin_logo_image' => 'Admin Logo',
            'admin_small_logo_image' => 'Admin Small Logo',
            'site_white_logo_image' => 'Site White Logo',
            'site_colored_logo_image' => 'Site Colored Logo',
            'google_analytic' => 'Google Analytic',
            'seo' => 'Seo',
            'site_name' => 'Site Name',
            'site_desc' => 'Site Description',
            'site_keywords' => 'Site Keywords',
            'seperate_with_commas' => 'Seperate with commas',
            'categories' => 'Categories',
            'add_category' => 'Add Category',
            'edit_category' => 'Edit Category',
            'category_name' => 'Category Name',
            'status' => 'Status',
            'select_your_option' => 'Select Your Option',
            'enable' => 'Enable',
            'disable' => 'Disable',
            'please_create_a_category' => 'Please create a category.',
            'blogs' => 'Blogs',
            'add_blog' => 'Add Blog',
            'edit_blog' => 'Edit Blog',
            'short_desc' => 'Short Description',
        ]);
    }
}
