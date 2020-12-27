<?php

namespace Database\Seeders;

use App\Models\Admin\ContentSixGroupKeyword;
use Illuminate\Database\Seeder;

class ContentSixGroupKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        ContentSixGroupKeyword::create([
            'language_id' => 1,
            'sections' => 'Sections',
            'hide' => 'Hide',
            'show' => 'Show',
            'pages' => 'Pages',
            'add_page' => 'Add Page',
            'edit_page' => 'Edit Page',
            'yes' => 'Yes',
            'no' => 'No',
            'display_footer_menu' => 'Display Footer Menu?',
            'display_dropdown' => 'Display Dropdown?',
            'default_site_language' => 'Default Site Language',
            'please_try_again' => 'Please try again!',
            'you_are_not_authorized' => 'You are not authorized to delete this operation.',
            'which_language' => 'Which language do you want to create the data?',
            'reminding' => 'Please note that all the entries you create will be based on your chosen language.',
            'email' => 'Email',
            'subject' => 'Subject',
            'message' => 'Message',
            'read_status' => 'Read Status',
            'mark_all_as_read' => 'Mark All As Read',
            'mark' => 'Mark',
            'messages' => 'Messages',
            'testimonials' => 'Testimonials',
            'add_testimonial' => 'Add Testimonial',
            'edit_testimonial' => 'Edit Testimonial',
            'comment' => 'Comment',
            'comments' => 'Comments',
            'approval_status' => 'Approval Status',
            'mark_all_as_approval' => 'Mark All As Approval',
            'read' => 'Read',
            'unread' => 'Unread',
            'profile' => 'Profile',
            'change_password' => 'Change Password',
            'current_password' => 'Current Password',
            'new_password' => 'New Password',
            'confirm_password' => 'Confirm Password',
            'star' => 'Star',
        ]);
    }
}
