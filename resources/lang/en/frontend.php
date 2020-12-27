<?php


use App\Models\Admin\FrontendOneGroupKeyword;
use App\Models\Admin\FrontendTwoGroupKeyword;
use App\Models\Admin\Language;
use Illuminate\Support\Facades\Schema;

$frontend_one_group_columns = Schema::getColumnListing('frontend_one_group_keywords');
$frontend_two_group_columns = Schema::getColumnListing('frontend_two_group_keywords');


if (session()->has('language_id_from_dropdown')) {

    $language_id_from_dropdown = session()->get('language_id_from_dropdown');

    $language_frontend_one_group_keyword = FrontendOneGroupKeyword::where('language_id', $language_id_from_dropdown)->first();
    $language_frontend_two_group_keyword = FrontendTwoGroupKeyword::where('language_id', $language_id_from_dropdown)->first();


} else {

    $language = Language::where('default_site_language', 1)->first();

    $language_frontend_one_group_keyword = FrontendOneGroupKeyword::where('language_id', $language->id)->first();
    $language_frontend_two_group_keyword = FrontendTwoGroupKeyword::where('language_id', $language->id)->first();

}


if (isset($language_frontend_one_group_keyword) && isset($language_frontend_two_group_keyword)) {

    return [

        /*
      |--------------------------------------------------------------------------
      | Pagination Language Lines
      |--------------------------------------------------------------------------
      |
      | The following language lines are used by the paginator library to build
      | the simple pagination links. You are free to change them to anything
      | you want to customize your views to better match your application.
      |
      */

        /* Frontend Group 1 */
        $frontend_one_group_columns[2] => $language_frontend_one_group_keyword->home,
        $frontend_one_group_columns[3] => $language_frontend_one_group_keyword->back_to_home,
        $frontend_one_group_columns[4] => $language_frontend_one_group_keyword->about,
        $frontend_one_group_columns[5] => $language_frontend_one_group_keyword->about_us,
        $frontend_one_group_columns[6] => $language_frontend_one_group_keyword->services,
        $frontend_one_group_columns[7] => $language_frontend_one_group_keyword->service_details,
        $frontend_one_group_columns[8] => $language_frontend_one_group_keyword->pricing,
        $frontend_one_group_columns[9] => $language_frontend_one_group_keyword->portfolio,
        $frontend_one_group_columns[10] => $language_frontend_one_group_keyword->work_details,
        $frontend_one_group_columns[11] => $language_frontend_one_group_keyword->blog,
        $frontend_one_group_columns[12] => $language_frontend_one_group_keyword->blogs,
        $frontend_one_group_columns[13] => $language_frontend_one_group_keyword->contact,
        $frontend_one_group_columns[14] => $language_frontend_one_group_keyword->monthly,
        $frontend_one_group_columns[15] => $language_frontend_one_group_keyword->yearly,
        $frontend_one_group_columns[16] => $language_frontend_one_group_keyword->annualy,
        $frontend_one_group_columns[17] => $language_frontend_one_group_keyword->admin,
        $frontend_one_group_columns[18] => $language_frontend_one_group_keyword->read_more,
        $frontend_one_group_columns[19] => $language_frontend_one_group_keyword->please_fill_required_fields,
        $frontend_one_group_columns[20] => $language_frontend_one_group_keyword->email_is_invalid,
        $frontend_one_group_columns[21] => $language_frontend_one_group_keyword->send_message,
        $frontend_one_group_columns[22] => $language_frontend_one_group_keyword->your_name,
        $frontend_one_group_columns[23] => $language_frontend_one_group_keyword->your_email,
        $frontend_one_group_columns[24] => $language_frontend_one_group_keyword->subject,
        $frontend_one_group_columns[25] => $language_frontend_one_group_keyword->your_message,
        $frontend_one_group_columns[26] => $language_frontend_one_group_keyword->your_comment,
        $frontend_one_group_columns[27] => $language_frontend_one_group_keyword->your_message_has_been_delivered,
        $frontend_one_group_columns[28] => $language_frontend_one_group_keyword->your_comment_is_pending_approval,
        $frontend_one_group_columns[29] => $language_frontend_one_group_keyword->help,
        $frontend_one_group_columns[30] => $language_frontend_one_group_keyword->contact_info,
        $frontend_one_group_columns[31] => $language_frontend_one_group_keyword->copyright,
        $frontend_one_group_columns[32] => $language_frontend_one_group_keyword->updating,
        $frontend_one_group_columns[33] => $language_frontend_one_group_keyword->all,

        /* Frontend Group 2 */
        $frontend_two_group_columns[2] => $language_frontend_two_group_keyword->recent_posts,
        $frontend_two_group_columns[3] => $language_frontend_two_group_keyword->by,
        $frontend_two_group_columns[4] => $language_frontend_two_group_keyword->pages,
        $frontend_two_group_columns[5] => $language_frontend_two_group_keyword->comments,
        $frontend_two_group_columns[6] => $language_frontend_two_group_keyword->reply,
        $frontend_two_group_columns[7] => $language_frontend_two_group_keyword->leave_a_comment,
        $frontend_two_group_columns[8] => $language_frontend_two_group_keyword->search,
        $frontend_two_group_columns[9] => $language_frontend_two_group_keyword->search_results,
        $frontend_two_group_columns[10] => $language_frontend_two_group_keyword->search_here,
        $frontend_two_group_columns[11] => $language_frontend_two_group_keyword->nothing_found,
        $frontend_two_group_columns[12] => $language_frontend_two_group_keyword->categories,
        $frontend_two_group_columns[13] => $language_frontend_two_group_keyword->links,
        $frontend_two_group_columns[14] => $language_frontend_two_group_keyword->contact_us,
        $frontend_two_group_columns[15] => $language_frontend_two_group_keyword->view_more,
        $frontend_two_group_columns[16] => $language_frontend_two_group_keyword->galleries,

    ];

}
else {

    return [

        /*
        |--------------------------------------------------------------------------
        | Pagination Language Lines
        |--------------------------------------------------------------------------
        |
        | The following language lines are used by the paginator library to build
        | the simple pagination links. You are free to change them to anything
        | you want to customize your views to better match your application.
        |
        */

        // Frontend One Group Keyword
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

        // Frontend Two Group Keyword
        'recent_posts' => 'Recent Posts',
        'by' => 'by',
        'pages' => 'Pages',
        'comments' => 'Comments',
        'reply' => 'Reply',
        'leave_a_comment' => 'Leave A Comment',
        'search' => 'Search',
        'search_results' => 'Search Results',
        'search_here' => 'Search Here',
        'nothing_found' => 'Nothing Found',
        'categories' => 'Categories',
        'links' => 'Links',
        'contact_us' => 'Contact Us',
        'view_more' => 'View More',
        'galleries' => 'Galleries',

    ];

}

