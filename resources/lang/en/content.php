<?php

use App\Models\Admin\ContentFiveGroupKeyword;
use App\Models\Admin\ContentFourGroupKeyword;
use App\Models\Admin\ContentOneGroupKeyword;
use App\Models\Admin\ContentSixGroupKeyword;
use App\Models\Admin\ContentThreeGroupKeyword;
use App\Models\Admin\ContentTwoGroupKeyword;
use App\Models\Admin\Language;
use Illuminate\Support\Facades\Schema;

$content_one_group_columns = Schema::getColumnListing('content_one_group_keywords');
$content_two_group_columns = Schema::getColumnListing('content_two_group_keywords');
$content_three_group_columns = Schema::getColumnListing('content_three_group_keywords');
$content_four_group_columns = Schema::getColumnListing('content_four_group_keywords');
$content_five_group_columns = Schema::getColumnListing('content_five_group_keywords');
$content_six_group_columns = Schema::getColumnListing('content_six_group_keywords');


if (session()->has('language_id_from_dropdown')) {

    $language_id_from_dropdown = session()->get('language_id_from_dropdown');

    $language_content_one_group_keyword = ContentOneGroupKeyword::where('language_id', $language_id_from_dropdown)->first();
    $language_content_two_group_keyword = ContentTwoGroupKeyword::where('language_id', $language_id_from_dropdown)->first();
    $language_content_three_group_keyword = ContentThreeGroupKeyword::where('language_id', $language_id_from_dropdown)->first();
    $language_content_four_group_keyword = ContentFourGroupKeyword::where('language_id', $language_id_from_dropdown)->first();
    $language_content_five_group_keyword = ContentFiveGroupKeyword::where('language_id', $language_id_from_dropdown)->first();
    $language_content_six_group_keyword = ContentSixGroupKeyword::where('language_id', $language_id_from_dropdown)->first();

} else {

    $language = Language::where('default_site_language', 1)->first();

    $language_content_one_group_keyword = ContentOneGroupKeyword::where('language_id', $language->id)->first();
    $language_content_two_group_keyword = ContentTwoGroupKeyword::where('language_id', $language->id)->first();
    $language_content_three_group_keyword = ContentThreeGroupKeyword::where('language_id', $language->id)->first();
    $language_content_four_group_keyword = ContentFourGroupKeyword::where('language_id', $language->id)->first();
    $language_content_five_group_keyword = ContentFiveGroupKeyword::where('language_id', $language->id)->first();
    $language_content_six_group_keyword = ContentSixGroupKeyword::where('language_id', $language->id)->first();

}

if (isset($language_content_one_group_keyword) && isset($language_content_two_group_keyword)  &&
   isset($language_content_three_group_keyword) && isset($language_content_four_group_keyword) &&
   isset($language_content_five_group_keyword) && isset($language_content_six_group_keyword)) {

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

        /* Content Group 1 */
        $content_one_group_columns[2] => $language_content_one_group_keyword->fixed_content,
        $content_one_group_columns[3] => $language_content_one_group_keyword->title,
        $content_one_group_columns[4] => $language_content_one_group_keyword->desc,
        $content_one_group_columns[5] => $language_content_one_group_keyword->btn_name,
        $content_one_group_columns[6] => $language_content_one_group_keyword->btn_link,
        $content_one_group_columns[7] => $language_content_one_group_keyword->thumbnail,
        $content_one_group_columns[8] => $language_content_one_group_keyword->size,
        $content_one_group_columns[9] => $language_content_one_group_keyword->recommended_size,
        $content_one_group_columns[10] => $language_content_one_group_keyword->submit,
        $content_one_group_columns[11] => $language_content_one_group_keyword->created_successfully,
        $content_one_group_columns[12] => $language_content_one_group_keyword->updated_successfully,
        $content_one_group_columns[13] => $language_content_one_group_keyword->deleted_successfully,
        $content_one_group_columns[14] => $language_content_one_group_keyword->current_image,
        $content_one_group_columns[15] => $language_content_one_group_keyword->not_yet_created,
        $content_one_group_columns[16] => $language_content_one_group_keyword->background_image,
        $content_one_group_columns[17] => $language_content_one_group_keyword->image,
        $content_one_group_columns[18] => $language_content_one_group_keyword->sliders,
        $content_one_group_columns[19] => $language_content_one_group_keyword->add_slider,
        $content_one_group_columns[20] => $language_content_one_group_keyword->edit_slider,
        $content_one_group_columns[21] => $language_content_one_group_keyword->delete,
        $content_one_group_columns[22] => $language_content_one_group_keyword->close,
        $content_one_group_columns[23] => $language_content_one_group_keyword->you_wont_be_able_to_revert_this,
        $content_one_group_columns[24] => $language_content_one_group_keyword->cancel,
        $content_one_group_columns[25] => $language_content_one_group_keyword->yes_delete_it,
        $content_one_group_columns[26] => $language_content_one_group_keyword->order,
        $content_one_group_columns[27] => $language_content_one_group_keyword->video,
        $content_one_group_columns[28] => $language_content_one_group_keyword->about,
        $content_one_group_columns[29] => $language_content_one_group_keyword->information_list,
        $content_one_group_columns[30] => $language_content_one_group_keyword->add_info,
        $content_one_group_columns[31] => $language_content_one_group_keyword->add_new,
        $content_one_group_columns[32] => $language_content_one_group_keyword->edit_info,
        $content_one_group_columns[33] => $language_content_one_group_keyword->action,


        /* Content Group 2 */
        $content_two_group_columns[2] => $language_content_two_group_keyword->services,
        $content_two_group_columns[3] => $language_content_two_group_keyword->add_service,
        $content_two_group_columns[4] => $language_content_two_group_keyword->edit_service,
        $content_two_group_columns[5] => $language_content_two_group_keyword->icon,
        $content_two_group_columns[6] => $language_content_two_group_keyword->section_title_and_desc,
        $content_two_group_columns[7] => $language_content_two_group_keyword->features,
        $content_two_group_columns[8] => $language_content_two_group_keyword->add_feature,
        $content_two_group_columns[9] => $language_content_two_group_keyword->edit_feature,
        $content_two_group_columns[10] => $language_content_two_group_keyword->add_counter,
        $content_two_group_columns[11] => $language_content_two_group_keyword->edit_counter,
        $content_two_group_columns[12] => $language_content_two_group_keyword->timer,
        $content_two_group_columns[13] => $language_content_two_group_keyword->counters,
        $content_two_group_columns[14] => $language_content_two_group_keyword->how_to_install,
        $content_two_group_columns[15] => $language_content_two_group_keyword->add_how_to_install,
        $content_two_group_columns[16] => $language_content_two_group_keyword->video_link,
        $content_two_group_columns[17] => $language_content_two_group_keyword->edit_how_to_install,
        $content_two_group_columns[18] => $language_content_two_group_keyword->screenshots,
        $content_two_group_columns[19] => $language_content_two_group_keyword->add_screenshot,
        $content_two_group_columns[20] => $language_content_two_group_keyword->edit_screenshot,
        $content_two_group_columns[21] => $language_content_two_group_keyword->prices,
        $content_two_group_columns[22] => $language_content_two_group_keyword->add_price,
        $content_two_group_columns[23] => $language_content_two_group_keyword->edit_price,
        $content_two_group_columns[24] => $language_content_two_group_keyword->currency,
        $content_two_group_columns[25] => $language_content_two_group_keyword->price,
        $content_two_group_columns[26] => $language_content_two_group_keyword->time,
        $content_two_group_columns[27] => $language_content_two_group_keyword->badge,
        $content_two_group_columns[28] => $language_content_two_group_keyword->please_take_with_features_semicolon,
        $content_two_group_columns[29] => $language_content_two_group_keyword->teams,
        $content_two_group_columns[30] => $language_content_two_group_keyword->add_team,
        $content_two_group_columns[31] => $language_content_two_group_keyword->edit_team,
        $content_two_group_columns[32] => $language_content_two_group_keyword->name,
        $content_two_group_columns[33] => $language_content_two_group_keyword->job,

        /* Content Group 3 */
        $content_three_group_columns[2] => $language_content_three_group_keyword->link,
        $content_three_group_columns[3] => $language_content_three_group_keyword->faqs,
        $content_three_group_columns[4] => $language_content_three_group_keyword->add_faq,
        $content_three_group_columns[5] => $language_content_three_group_keyword->edit_faq,
        $content_three_group_columns[6] => $language_content_three_group_keyword->question,
        $content_three_group_columns[7] => $language_content_three_group_keyword->answer,
        $content_three_group_columns[8] => $language_content_three_group_keyword->site_info,
        $content_three_group_columns[9] => $language_content_three_group_keyword->copyright,
        $content_three_group_columns[10] => $language_content_three_group_keyword->favicon_image,
        $content_three_group_columns[11] => $language_content_three_group_keyword->admin_logo_image,
        $content_three_group_columns[12] => $language_content_three_group_keyword->admin_small_logo_image,
        $content_three_group_columns[13] => $language_content_three_group_keyword->site_white_logo_image,
        $content_three_group_columns[14] => $language_content_three_group_keyword->site_colored_logo_image,
        $content_three_group_columns[15] => $language_content_three_group_keyword->google_analytic,
        $content_three_group_columns[16] => $language_content_three_group_keyword->seo,
        $content_three_group_columns[17] => $language_content_three_group_keyword->site_name,
        $content_three_group_columns[18] => $language_content_three_group_keyword->site_desc,
        $content_three_group_columns[19] => $language_content_three_group_keyword->site_keywords,
        $content_three_group_columns[20] => $language_content_three_group_keyword->seperate_with_commas,
        $content_three_group_columns[21] => $language_content_three_group_keyword->categories,
        $content_three_group_columns[22] => $language_content_three_group_keyword->add_category,
        $content_three_group_columns[23] => $language_content_three_group_keyword->edit_category,
        $content_three_group_columns[24] => $language_content_three_group_keyword->category_name,
        $content_three_group_columns[25] => $language_content_three_group_keyword->status,
        $content_three_group_columns[26] => $language_content_three_group_keyword->select_your_option,
        $content_three_group_columns[27] => $language_content_three_group_keyword->enable,
        $content_three_group_columns[28] => $language_content_three_group_keyword->disable,
        $content_three_group_columns[29] => $language_content_three_group_keyword->please_create_a_category,
        $content_three_group_columns[30] => $language_content_three_group_keyword->blogs,
        $content_three_group_columns[31] => $language_content_three_group_keyword->add_blog,
        $content_three_group_columns[32] => $language_content_three_group_keyword->edit_blog,
        $content_three_group_columns[33] => $language_content_three_group_keyword->short_desc,

        /* Content Group 4 */
        $content_four_group_columns[2] => $language_content_four_group_keyword->tag,
        $content_four_group_columns[3] => $language_content_four_group_keyword->author,
        $content_four_group_columns[4] => $language_content_four_group_keyword->category,
        $content_four_group_columns[5] => $language_content_four_group_keyword->post_date,
        $content_four_group_columns[6] => $language_content_four_group_keyword->view,
        $content_four_group_columns[7] => $language_content_four_group_keyword->homepage_versions,
        $content_four_group_columns[8] => $language_content_four_group_keyword->choose_version,
        $content_four_group_columns[9] => $language_content_four_group_keyword->map_iframe,
        $content_four_group_columns[10] => $language_content_four_group_keyword->map_iframe_desc_placeholder,
        $content_four_group_columns[11] => $language_content_four_group_keyword->contact,
        $content_four_group_columns[12] => $language_content_four_group_keyword->add_contact,
        $content_four_group_columns[13] => $language_content_four_group_keyword->edit_contact,
        $content_four_group_columns[14] => $language_content_four_group_keyword->apps,
        $content_four_group_columns[15] => $language_content_four_group_keyword->add_app,
        $content_four_group_columns[16] => $language_content_four_group_keyword->edit_app,
        $content_four_group_columns[17] => $language_content_four_group_keyword->site_images,
        $content_four_group_columns[18] => $language_content_four_group_keyword->themes,
        $content_four_group_columns[19] => $language_content_four_group_keyword->choose_theme,
        $content_four_group_columns[20] => $language_content_four_group_keyword->animated_desc,
        $content_four_group_columns[21] => $language_content_four_group_keyword->top_title,
        $content_four_group_columns[22] => $language_content_four_group_keyword->skills,
        $content_four_group_columns[23] => $language_content_four_group_keyword->add_skill,
        $content_four_group_columns[24] => $language_content_four_group_keyword->edit_skill,
        $content_four_group_columns[25] => $language_content_four_group_keyword->section_title,
        $content_four_group_columns[26] => $language_content_four_group_keyword->percent_rate,
        $content_four_group_columns[27] => $language_content_four_group_keyword->add_service_item,
        $content_four_group_columns[28] => $language_content_four_group_keyword->edit_service_item,
        $content_four_group_columns[29] => $language_content_four_group_keyword->item,
        $content_four_group_columns[30] => $language_content_four_group_keyword->works,
        $content_four_group_columns[31] => $language_content_four_group_keyword->add_work,
        $content_four_group_columns[32] => $language_content_four_group_keyword->edit_work,
        $content_four_group_columns[33] => $language_content_four_group_keyword->likes,

        /* Content Group 5 */
        $content_five_group_columns[2] => $language_content_five_group_keyword->add_work_item,
        $content_five_group_columns[3] => $language_content_five_group_keyword->edit_work_item,
        $content_five_group_columns[4] => $language_content_five_group_keyword->work_items,
        $content_five_group_columns[5] => $language_content_five_group_keyword->call_to_action,
        $content_five_group_columns[6] => $language_content_five_group_keyword->galleries,
        $content_five_group_columns[7] => $language_content_five_group_keyword->add_gallery,
        $content_five_group_columns[8] => $language_content_five_group_keyword->edit_gallery,
        $content_five_group_columns[9] => $language_content_five_group_keyword->monthly,
        $content_five_group_columns[10] => $language_content_five_group_keyword->yearly,
        $content_five_group_columns[11] => $language_content_five_group_keyword->languages,
        $content_five_group_columns[12] => $language_content_five_group_keyword->add_language,
        $content_five_group_columns[13] => $language_content_five_group_keyword->edit_language,
        $content_five_group_columns[14] => $language_content_five_group_keyword->language_name,
        $content_five_group_columns[15] => $language_content_five_group_keyword->language_code,
        $content_five_group_columns[16] => $language_content_five_group_keyword->direction,
        $content_five_group_columns[17] => $language_content_five_group_keyword->keywords,
        $content_five_group_columns[18] => $language_content_five_group_keyword->for_admin_panel,
        $content_five_group_columns[19] => $language_content_five_group_keyword->for_frontend,
        $content_five_group_columns[20] => $language_content_five_group_keyword->content_group,
        $content_five_group_columns[21] => $language_content_five_group_keyword->menu,
        $content_five_group_columns[22] => $language_content_five_group_keyword->service_items,
        $content_five_group_columns[23] => $language_content_five_group_keyword->external_url,
        $content_five_group_columns[24] => $language_content_five_group_keyword->socials,
        $content_five_group_columns[25] => $language_content_five_group_keyword->add_social,
        $content_five_group_columns[26] => $language_content_five_group_keyword->edit_social,
        $content_five_group_columns[27] => $language_content_five_group_keyword->quick_access_buttons,
        $content_five_group_columns[28] => $language_content_five_group_keyword->email_or_phone,
        $content_five_group_columns[29] => $language_content_five_group_keyword->breadcrumb,
        $content_five_group_columns[30] => $language_content_five_group_keyword->color,
        $content_five_group_columns[31] => $language_content_five_group_keyword->color_code,
        $content_five_group_columns[32] => $language_content_five_group_keyword->ready_color_option,
        $content_five_group_columns[33] => $language_content_five_group_keyword->this_color_option_will_be_deleted,


        /* Content Group 6 */
        $content_six_group_columns[2] => $language_content_six_group_keyword->sections,
        $content_six_group_columns[3] => $language_content_six_group_keyword->hide,
        $content_six_group_columns[4] => $language_content_six_group_keyword->show,
        $content_six_group_columns[5] => $language_content_six_group_keyword->pages,
        $content_six_group_columns[6] => $language_content_six_group_keyword->add_page,
        $content_six_group_columns[7] => $language_content_six_group_keyword->edit_page,
        $content_six_group_columns[8] => $language_content_six_group_keyword->yes,
        $content_six_group_columns[9] => $language_content_six_group_keyword->no,
        $content_six_group_columns[10] => $language_content_six_group_keyword->display_footer_menu,
        $content_six_group_columns[11] => $language_content_six_group_keyword->display_dropdown,
        $content_six_group_columns[12] => $language_content_six_group_keyword->default_site_language,
        $content_six_group_columns[13] => $language_content_six_group_keyword->please_try_again,
        $content_six_group_columns[14] => $language_content_six_group_keyword->you_are_not_authorized,
        $content_six_group_columns[15] => $language_content_six_group_keyword->which_language,
        $content_six_group_columns[16] => $language_content_six_group_keyword->reminding,
        $content_six_group_columns[17] => $language_content_six_group_keyword->email,
        $content_six_group_columns[18] => $language_content_six_group_keyword->subject,
        $content_six_group_columns[19] => $language_content_six_group_keyword->message,
        $content_six_group_columns[20] => $language_content_six_group_keyword->read_status,
        $content_six_group_columns[21] => $language_content_six_group_keyword->mark_all_as_read,
        $content_six_group_columns[22] => $language_content_six_group_keyword->mark,
        $content_six_group_columns[23] => $language_content_six_group_keyword->messages,
        $content_six_group_columns[24] => $language_content_six_group_keyword->testimonials,
        $content_six_group_columns[25] => $language_content_six_group_keyword->add_testimonial,
        $content_six_group_columns[26] => $language_content_six_group_keyword->edit_testimonial,
        $content_six_group_columns[27] => $language_content_six_group_keyword->comment,
        $content_six_group_columns[28] => $language_content_six_group_keyword->comments,
        $content_six_group_columns[29] => $language_content_six_group_keyword->approval_status,
        $content_six_group_columns[30] => $language_content_six_group_keyword->mark_all_as_approval,
        $content_six_group_columns[31] => $language_content_six_group_keyword->read,
        $content_six_group_columns[32] => $language_content_six_group_keyword->unread,
        $content_six_group_columns[33] => $language_content_six_group_keyword->profile,
        $content_six_group_columns[34] => $language_content_six_group_keyword->change_password,
        $content_six_group_columns[35] => $language_content_six_group_keyword->current_password,
        $content_six_group_columns[36] => $language_content_six_group_keyword->new_password,
        $content_six_group_columns[37] => $language_content_six_group_keyword->confirm_password,
        $content_six_group_columns[38] => $language_content_six_group_keyword->star,

    ];

} else {

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

        /* Content Group 1 */
        'fixed_content' => 'Fixed Content',
        'title' => 'Title',
        'desc' => 'Description',
        'btn_name' => 'Button Name',
        'btn_link' => 'Button Link',
        'thumbnail' => 'Thumbnail',
        'size' => 'size',
        'recommended_size' => 'You do not have to use the recommended sizes. However, please use the recommended sizes for your site design to look its best.',
        'submit' => 'Submit',
        'created_successfully' => 'Created Successfully.',
        'updated_successfully' => 'Updated Successfully.',
        'deleted_successfully' => 'Deleted Successfully.',
        'current_image' => 'Current Image',
        'not_yet_created' => 'Not yet created.',
        'background_image' => 'Background Image',
        'image' => 'Image',
        'sliders' => 'Sliders',
        'add_slider' => 'Add Slider',
        'edit_slider' => 'Edit Slider',
        'delete' => 'Delete',
        'close' => 'Close',
        'you_wont_be_able_to_revert_this' => 'You wont be able to revert this!',
        'cancel' => 'Cancel',
        'yes_delete_it' => 'Yes, delete it!',
        'order' => 'Order',
        'video' => 'Video',
        'about' => 'About',
        'information_list' => 'Information List',
        'add_info' => 'Add Info',
        'add_new' => 'Add New',
        'edit_info' => 'Edit Info',
        'action' => 'Action',

        /* Content Group 2 */
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
        'currency' => 'Currency',
        'price' => 'Price',
        'time' => 'Time',
        'badge' => 'Badge',
        'please_take_with_features_semicolon' => 'Please take with features semicolon(;).',
        'teams' => 'Teams',
        'add_team' => 'Add Team',
        'edit_team' => 'Edit Team',
        'name' => 'Name',
        'job' => 'Job',

        /* Content Group 3 */
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

        /* Content Group 4 */
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

        /* Content Group 5 */
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

        /* Content Group 6 */
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

    ];

}



