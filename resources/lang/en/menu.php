<?php

use App\Models\Admin\Language;
use App\Models\Admin\MenuKeyword;
use Illuminate\Support\Facades\Schema;


$menu_columns = Schema::getColumnListing('menu_keywords');


if (session()->has('language_id_from_dropdown')) {

    $language_id_from_dropdown = session()->get('language_id_from_dropdown');

    $language_menu_keyword = MenuKeyword::where('language_id', $language_id_from_dropdown)->first();


} else {

    $language = Language::where('default_site_language', 1)->first();

    $language_menu_keyword = MenuKeyword::where('language_id', $language->id)->first();

}


if (isset($language_menu_keyword)) {

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

        $menu_columns[2] => $language_menu_keyword->banner,
        $menu_columns[3] => $language_menu_keyword->fixed_content,
        $menu_columns[4] => $language_menu_keyword->background_image,
        $menu_columns[5] => $language_menu_keyword->sliders,
        $menu_columns[6] => $language_menu_keyword->video,
        $menu_columns[7] => $language_menu_keyword->about,
        $menu_columns[8] => $language_menu_keyword->services,
        $menu_columns[9] => $language_menu_keyword->features,
        $menu_columns[10] => $language_menu_keyword->counters,
        $menu_columns[11] => $language_menu_keyword->how_to_install,
        $menu_columns[12] => $language_menu_keyword->screenshots,
        $menu_columns[13] => $language_menu_keyword->prices,
        $menu_columns[14] => $language_menu_keyword->teams,
        $menu_columns[15] => $language_menu_keyword->faqs,
        $menu_columns[16] => $language_menu_keyword->site_info,
        $menu_columns[17] => $language_menu_keyword->site_images,
        $menu_columns[18] => $language_menu_keyword->homepage_versions,
        $menu_columns[19] => $language_menu_keyword->google_analytic,
        $menu_columns[20] => $language_menu_keyword->sections,
        $menu_columns[21] => $language_menu_keyword->color,
        $menu_columns[22] => $language_menu_keyword->seo,
        $menu_columns[23] => $language_menu_keyword->categories,
        $menu_columns[24] => $language_menu_keyword->blogs,
        $menu_columns[25] => $language_menu_keyword->contact,
        $menu_columns[26] => $language_menu_keyword->contact_info,
        $menu_columns[27] => $language_menu_keyword->apps,
        $menu_columns[28] => $language_menu_keyword->settings,
        $menu_columns[29] => $language_menu_keyword->themes,
        $menu_columns[30] => $language_menu_keyword->languages,
        $menu_columns[31] => $language_menu_keyword->logout,
        $menu_columns[32] => $language_menu_keyword->skills,
        $menu_columns[33] => $language_menu_keyword->works,
        $menu_columns[34] => $language_menu_keyword->call_to_action,
        $menu_columns[35] => $language_menu_keyword->galleries,
        $menu_columns[36] => $language_menu_keyword->external_url,
        $menu_columns[37] => $language_menu_keyword->socials,
        $menu_columns[38] => $language_menu_keyword->quick_access_buttons,
        $menu_columns[39] => $language_menu_keyword->breadcrumb,
        $menu_columns[40] => $language_menu_keyword->pages,
        $menu_columns[41] => $language_menu_keyword->messages,
        $menu_columns[42] => $language_menu_keyword->testimonials,
        $menu_columns[43] => $language_menu_keyword->notifications,
        $menu_columns[44] => $language_menu_keyword->profile,
        $menu_columns[45] => $language_menu_keyword->change_password,
        $menu_columns[46] => $language_menu_keyword->data_language,
        $menu_columns[47] => $language_menu_keyword->dashboard,
        $menu_columns[48] => $language_menu_keyword->optimizer,
        $menu_columns[49] => $language_menu_keyword->user_management,

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

    ];


}