<?php

namespace Database\Seeders;

use App\Models\Admin\FrontendOneGroupKeyword;
use Illuminate\Database\Seeder;

class FrontendOneGroupKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        FrontendOneGroupKeyword::create([
            'language_id' => 1,
            'home' => 'Home',
            'back_to_home' => 'Back To Home',
            'about' => 'About',
            'about_us' => 'About Us',
            'services' => 'Services',
            'service_details' => 'Service Details',
            'pricing' => 'Pricing',
            'portfolio' => 'Portfolio',
            'work_details' => 'Work Details',
            'blog' => 'Blog',
            'blogs' => 'Blogs',
            'contact' => 'Contact',
            'monthly' => 'Monthly',
            'yearly' => 'Yearly',
            'annualy' => 'Annualy',
            'admin' => 'Admin',
            'read_more' => 'Read More',
            'please_fill_required_fields' => 'Please Fill Required Fields',
            'email_is_invalid' => 'Email is invalid',
            'send_message' => 'Send Message',
            'your_name' => 'Your Name *',
            'your_email' => 'Your Email *',
            'subject' => 'Subject *',
            'your_message' => 'Your Message *',
            'your_comment' => 'Your Comment *',
            'your_message_has_been_delivered' => 'Your message has been delivered.',
            'your_comment_is_pending_approval' => 'Your comment is pending approval.',
            'help' => 'Help',
            'contact_info' => 'Contact Info',
            'copyright' => 'Copyright',
            'updating' => 'Updating...',
            'all' => 'All',
        ]);
    }
}
