<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ContentFiveGroupKeyword;
use App\Models\Admin\ContentFourGroupKeyword;
use App\Models\Admin\ContentOneGroupKeyword;
use App\Models\Admin\ContentSixGroupKeyword;
use App\Models\Admin\ContentThreeGroupKeyword;
use App\Models\Admin\ContentTwoGroupKeyword;
use App\Models\Admin\FrontendOneGroupKeyword;
use App\Models\Admin\FrontendTwoGroupKeyword;
use App\Models\Admin\MenuKeyword;
use Illuminate\Http\Request;

class LanguageKeywordController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // Retrieving a model
        $menu_keyword = MenuKeyword::where('language_id', $id)->first();
        $content_one_group_keyword = ContentOneGroupKeyword::where('language_id', $id)->first();
        $content_two_group_keyword = ContentTwoGroupKeyword::where('language_id', $id)->first();
        $content_three_group_keyword = ContentThreeGroupKeyword::where('language_id', $id)->first();
        $content_four_group_keyword = ContentFourGroupKeyword::where('language_id', $id)->first();
        $content_five_group_keyword = ContentFiveGroupKeyword::where('language_id', $id)->first();
        $content_six_group_keyword = ContentSixGroupKeyword::where('language_id', $id)->first();

        return view('admin.language.keyword.for_adminpanel.create', compact('id', 'menu_keyword',
            'content_one_group_keyword', 'content_two_group_keyword', 'content_three_group_keyword',
            'content_four_group_keyword', 'content_five_group_keyword', 'content_six_group_keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function frontend_create($id)
    {
        // Retrieving a model
        $frontend_one_group_keyword = FrontendOneGroupKeyword::where('language_id', $id)->first();
        $frontend_two_group_keyword = FrontendTwoGroupKeyword::where('language_id', $id)->first();

        return view('admin.language.keyword.for_frontend.create', compact('id',
            'frontend_one_group_keyword', 'frontend_two_group_keyword'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_menu_keyword(Request $request)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|unique:menu_keywords',
            'banner' => 'required',
            'fixed_content' => 'required',
            'background_image' => 'required',
            'sliders' => 'required',
            'video' => 'required',
            'about' => 'required',
            'services' => 'required',
            'features' => 'required',
            'counters' => 'required',
            'how_to_install' => 'required',
            'screenshots' => 'required',
            'prices' => 'required',
            'teams' => 'required',
            'faqs' => 'required',
            'site_info' => 'required',
            'site_images' => 'required',
            'homepage_versions' => 'required',
            'google_analytic' => 'required',
            'sections' => 'required',
            'color' => 'required',
            'seo' => 'required',
            'categories' => 'required',
            'blogs' => 'required',
            'contact' => 'required',
            'contact_info' => 'required',
            'apps' => 'required',
            'settings' => 'required',
            'themes' => 'required',
            'languages' => 'required',
            'logout' => 'required',
            'skills' => 'required',
            'works' => 'required',
            'call_to_action' => 'required',
            'galleries' => 'required',
            'external_url' => 'required',
            'socials' => 'required',
            'quick_access_buttons' => 'required',
            'breadcrumb' => 'required',
            'pages' => 'required',
            'messages' => 'required',
            'testimonials' => 'required',
            'notifications' => 'required',
            'profile' => 'required',
            'change_password' => 'required',
            'data_language' => 'required',
            'dashboard' => 'required',
            'optimizer' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        MenuKeyword::firstOrCreate([
            'language_id' => $input['language_id'],
            'banner' => $input['banner'],
            'fixed_content' => $input['fixed_content'],
            'background_image' => $input['background_image'],
            'sliders' => $input['sliders'],
            'video' => $input['video'],
            'about' => $input['about'],
            'services' => $input['services'],
            'features' => $input['features'],
            'counters' => $input['counters'],
            'how_to_install' => $input['how_to_install'],
            'screenshots' => $input['screenshots'],
            'prices' => $input['prices'],
            'teams' => $input['teams'],
            'faqs' => $input['faqs'],
            'site_info' => $input['site_info'],
            'site_images' => $input['site_images'],
            'homepage_versions' => $input['homepage_versions'],
            'google_analytic' => $input['google_analytic'],
            'sections' => $input['sections'],
            'color' => $input['color'],
            'seo' => $input['seo'],
            'categories' => $input['categories'],
            'blogs' => $input['blogs'],
            'contact' => $input['contact'],
            'contact_info' => $input['contact_info'],
            'apps' => $input['apps'],
            'settings' => $input['settings'],
            'themes' => $input['themes'],
            'languages' => $input['languages'],
            'logout' => $input['logout'],
            'skills' => $input['skills'],
            'works' => $input['works'],
            'call_to_action' => $input['call_to_action'],
            'galleries' => $input['galleries'],
            'external_url' => $input['external_url'],
            'socials' => $input['socials'],
            'quick_access_buttons' => $input['quick_access_buttons'],
            'breadcrumb' => $input['breadcrumb'],
            'pages' => $input['pages'],
            'messages' => $input['messages'],
            'testimonials' => $input['testimonials'],
            'notifications' => $input['notifications'],
            'profile' => $input['profile'],
            'change_password' => $input['change_password'],
            'data_language' => $input['data_language'],
            'dashboard' => $input['dashboard'],
            'optimizer' => $input['optimizer'],
        ]);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.created_successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_menu_keyword(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|integer',
            'banner' => 'required',
            'fixed_content' => 'required',
            'background_image' => 'required',
            'sliders' => 'required',
            'video' => 'required',
            'about' => 'required',
            'services' => 'required',
            'features' => 'required',
            'counters' => 'required',
            'how_to_install' => 'required',
            'screenshots' => 'required',
            'prices' => 'required',
            'teams' => 'required',
            'faqs' => 'required',
            'site_info' => 'required',
            'site_images' => 'required',
            'homepage_versions' => 'required',
            'google_analytic' => 'required',
            'sections' => 'required',
            'color' => 'required',
            'seo' => 'required',
            'categories' => 'required',
            'blogs' => 'required',
            'contact' => 'required',
            'contact_info' => 'required',
            'apps' => 'required',
            'settings' => 'required',
            'themes' => 'required',
            'languages' => 'required',
            'logout' => 'required',
            'skills' => 'required',
            'works' => 'required',
            'call_to_action' => 'required',
            'galleries' => 'required',
            'external_url' => 'required',
            'socials' => 'required',
            'quick_access_buttons' => 'required',
            'breadcrumb' => 'required',
            'pages' => 'required',
            'messages' => 'required',
            'testimonials' => 'required',
            'notifications' => 'required',
            'profile' => 'required',
            'change_password' => 'required',
            'data_language' => 'required',
            'dashboard' => 'required',
            'optimizer' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        $menu_keyword = MenuKeyword::where('language_id', $id)->first();

        // Update to database
        MenuKeyword::find($menu_keyword->id)->update($input);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_content_one_group_keyword(Request $request)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|unique:content_one_group_keywords',
            'fixed_content' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'btn_name' => 'required',
            'btn_link' => 'required',
            'thumbnail' => 'required',
            'size' => 'required',
            'recommended_size' => 'required',
            'submit' => 'required',
            'created_successfully' => 'required',
            'updated_successfully' => 'required',
            'deleted_successfully' => 'required',
            'current_image' => 'required',
            'not_yet_created' => 'required',
            'background_image' => 'required',
            'image' => 'required',
            'sliders' => 'required',
            'add_slider' => 'required',
            'edit_slider' => 'required',
            'delete' => 'required',
            'close' => 'required',
            'you_wont_be_able_to_revert_this' => 'required',
            'cancel' => 'required',
            'yes_delete_it' => 'required',
            'order' => 'required',
            'video' => 'required',
            'about' => 'required',
            'information_list' => 'required',
            'add_info' => 'required',
            'add_new' => 'required',
            'edit_info' => 'required',
            'action' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        ContentOneGroupKeyword::firstOrCreate([
            'language_id' => $input['language_id'],
            'fixed_content' => $input['fixed_content'],
            'title' => $input['title'],
            'desc' => $input['desc'],
            'btn_name' => $input['btn_name'],
            'btn_link' => $input['btn_link'],
            'thumbnail' => $input['thumbnail'],
            'size' => $input['size'],
            'recommended_size' => $input['recommended_size'],
            'submit' => $input['submit'],
            'created_successfully' => $input['created_successfully'],
            'updated_successfully' => $input['updated_successfully'],
            'deleted_successfully' => $input['deleted_successfully'],
            'current_image' => $input['current_image'],
            'not_yet_created' => $input['not_yet_created'],
            'background_image' => $input['background_image'],
            'image' => $input['image'],
            'sliders' => $input['sliders'],
            'add_slider' => $input['add_slider'],
            'edit_slider' => $input['edit_slider'],
            'delete' => $input['delete'],
            'close' => $input['close'],
            'you_wont_be_able_to_revert_this' => $input['you_wont_be_able_to_revert_this'],
            'cancel' => $input['cancel'],
            'yes_delete_it' => $input['yes_delete_it'],
            'order' => $input['order'],
            'video' => $input['video'],
            'about' => $input['about'],
            'information_list' => $input['information_list'],
            'add_info' => $input['add_info'],
            'add_new' => $input['add_new'],
            'edit_info' => $input['edit_info'],
            'action' => $input['action'],
        ]);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.created_successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_content_one_group_keyword(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|integer',
            'fixed_content' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'btn_name' => 'required',
            'btn_link' => 'required',
            'thumbnail' => 'required',
            'size' => 'required',
            'recommended_size' => 'required',
            'submit' => 'required',
            'created_successfully' => 'required',
            'updated_successfully' => 'required',
            'deleted_successfully' => 'required',
            'current_image' => 'required',
            'not_yet_created' => 'required',
            'background_image' => 'required',
            'image' => 'required',
            'sliders' => 'required',
            'add_slider' => 'required',
            'edit_slider' => 'required',
            'delete' => 'required',
            'close' => 'required',
            'you_wont_be_able_to_revert_this' => 'required',
            'cancel' => 'required',
            'yes_delete_it' => 'required',
            'order' => 'required',
            'video' => 'required',
            'about' => 'required',
            'information_list' => 'required',
            'add_info' => 'required',
            'add_new' => 'required',
            'edit_info' => 'required',
            'action' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        $content_one_group_keyword = ContentOneGroupKeyword::where('language_id', $id)->first();

        // Update to database
        ContentOneGroupKeyword::find($content_one_group_keyword->id)->update($input);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_content_two_group_keyword(Request $request)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|unique:content_two_group_keywords',
            'services' => 'required',
            'add_service' => 'required',
            'edit_service' => 'required',
            'icon' => 'required',
            'section_title_and_desc' => 'required',
            'features' => 'required',
            'add_feature' => 'required',
            'edit_feature' => 'required',
            'add_counter' => 'required',
            'edit_counter' => 'required',
            'timer' => 'required',
            'counters' => 'required',
            'how_to_install' => 'required',
            'add_how_to_install' => 'required',
            'video_link' => 'required',
            'edit_how_to_install' => 'required',
            'screenshots' => 'required',
            'add_screenshot' => 'required',
            'edit_screenshot' => 'required',
            'prices' => 'required',
            'add_price' => 'required',
            'edit_price' => 'required',
            'currency' => 'required',
            'price' => 'required',
            'time' => 'required',
            'badge' => 'required',
            'please_take_with_features_semicolon' => 'required',
            'teams' => 'required',
            'add_team' => 'required',
            'edit_team' => 'required',
            'name' => 'required',
            'job' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        ContentTwoGroupKeyword::firstOrCreate([
            'language_id' => $input['language_id'],
            'services' => $input['services'],
            'add_service' => $input['add_service'],
            'edit_service' => $input['edit_service'],
            'icon' => $input['icon'],
            'section_title_and_desc' => $input['section_title_and_desc'],
            'features' => $input['features'],
            'add_feature' => $input['add_feature'],
            'edit_feature' => $input['edit_feature'],
            'add_counter' => $input['add_counter'],
            'edit_counter' => $input['edit_counter'],
            'timer' => $input['timer'],
            'counters' => $input['counters'],
            'how_to_install' => $input['how_to_install'],
            'add_how_to_install' => $input['add_how_to_install'],
            'video_link' => $input['video_link'],
            'edit_how_to_install' => $input['edit_how_to_install'],
            'screenshots' => $input['screenshots'],
            'add_screenshot' => $input['add_screenshot'],
            'edit_screenshot' => $input['edit_screenshot'],
            'prices' => $input['prices'],
            'add_price' => $input['add_price'],
            'edit_price' => $input['edit_price'],
            'currency' => $input['currency'],
            'price' => $input['price'],
            'time' => $input['time'],
            'badge' => $input['badge'],
            'please_take_with_features_semicolon' => $input['please_take_with_features_semicolon'],
            'teams' => $input['teams'],
            'add_team' => $input['add_team'],
            'edit_team' => $input['edit_team'],
            'name' => $input['name'],
            'job' => $input['job'],
        ]);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.created_successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_content_two_group_keyword(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|integer',
            'services' => 'required',
            'add_service' => 'required',
            'edit_service' => 'required',
            'icon' => 'required',
            'section_title_and_desc' => 'required',
            'features' => 'required',
            'add_feature' => 'required',
            'edit_feature' => 'required',
            'add_counter' => 'required',
            'edit_counter' => 'required',
            'timer' => 'required',
            'counters' => 'required',
            'how_to_install' => 'required',
            'add_how_to_install' => 'required',
            'video_link' => 'required',
            'edit_how_to_install' => 'required',
            'screenshots' => 'required',
            'add_screenshot' => 'required',
            'edit_screenshot' => 'required',
            'prices' => 'required',
            'add_price' => 'required',
            'edit_price' => 'required',
            'currency' => 'required',
            'price' => 'required',
            'time' => 'required',
            'badge' => 'required',
            'please_take_with_features_semicolon' => 'required',
            'teams' => 'required',
            'add_team' => 'required',
            'edit_team' => 'required',
            'name' => 'required',
            'job' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        $content_two_group_keyword = ContentTwoGroupKeyword::where('language_id', $id)->first();

        // Update to database
        ContentTwoGroupKeyword::find($content_two_group_keyword->id)->update($input);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_content_three_group_keyword(Request $request)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|unique:content_three_group_keywords',
            'link' => 'required',
            'faqs' => 'required',
            'add_faq' => 'required',
            'edit_faq' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'site_info' => 'required',
            'copyright' => 'required',
            'favicon_image' => 'required',
            'admin_logo_image' => 'required',
            'admin_small_logo_image' => 'required',
            'site_white_logo_image' => 'required',
            'site_colored_logo_image' => 'required',
            'google_analytic' => 'required',
            'seo' => 'required',
            'site_name' => 'required',
            'site_desc' => 'required',
            'site_keywords' => 'required',
            'seperate_with_commas' => 'required',
            'categories' => 'required',
            'add_category' => 'required',
            'edit_category' => 'required',
            'category_name' => 'required',
            'status' => 'required',
            'select_your_option' => 'required',
            'enable' => 'required',
            'disable' => 'required',
            'please_create_a_category' => 'required',
            'blogs' => 'required',
            'add_blog' => 'required',
            'edit_blog' => 'required',
            'short_desc' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        ContentThreeGroupKeyword::firstOrCreate([
            'language_id' => $input['language_id'],
            'link' => $input['link'],
            'faqs' => $input['faqs'],
            'add_faq' => $input['add_faq'],
            'edit_faq' => $input['edit_faq'],
            'question' => $input['question'],
            'answer' => $input['answer'],
            'site_info' => $input['site_info'],
            'copyright' => $input['copyright'],
            'favicon_image' => $input['favicon_image'],
            'admin_logo_image' => $input['admin_logo_image'],
            'admin_small_logo_image' => $input['admin_small_logo_image'],
            'site_white_logo_image' => $input['site_white_logo_image'],
            'site_colored_logo_image' => $input['site_colored_logo_image'],
            'google_analytic' => $input['google_analytic'],
            'seo' => $input['seo'],
            'site_name' => $input['site_name'],
            'site_desc' => $input['site_desc'],
            'site_keywords' => $input['site_keywords'],
            'seperate_with_commas' => $input['seperate_with_commas'],
            'categories' => $input['categories'],
            'add_category' => $input['add_category'],
            'edit_category' => $input['edit_category'],
            'category_name' => $input['category_name'],
            'status' => $input['status'],
            'select_your_option' => $input['select_your_option'],
            'enable' => $input['enable'],
            'disable' => $input['disable'],
            'please_create_a_category' => $input['please_create_a_category'],
            'blogs' => $input['blogs'],
            'add_blog' => $input['add_blog'],
            'edit_blog' => $input['edit_blog'],
            'short_desc' => $input['short_desc'],
        ]);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.created_successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_content_three_group_keyword(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|integer',
            'link' => 'required',
            'faqs' => 'required',
            'add_faq' => 'required',
            'edit_faq' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'site_info' => 'required',
            'copyright' => 'required',
            'favicon_image' => 'required',
            'admin_logo_image' => 'required',
            'admin_small_logo_image' => 'required',
            'site_white_logo_image' => 'required',
            'site_colored_logo_image' => 'required',
            'google_analytic' => 'required',
            'seo' => 'required',
            'site_name' => 'required',
            'site_desc' => 'required',
            'site_keywords' => 'required',
            'seperate_with_commas' => 'required',
            'categories' => 'required',
            'add_category' => 'required',
            'edit_category' => 'required',
            'category_name' => 'required',
            'status' => 'required',
            'select_your_option' => 'required',
            'enable' => 'required',
            'disable' => 'required',
            'please_create_a_category' => 'required',
            'blogs' => 'required',
            'add_blog' => 'required',
            'edit_blog' => 'required',
            'short_desc' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        $content_three_group_keyword = ContentThreeGroupKeyword::where('language_id', $id)->first();

        // Update to database
        ContentThreeGroupKeyword::find($content_three_group_keyword->id)->update($input);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.updated_successfully');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_content_four_group_keyword(Request $request)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|unique:content_four_group_keywords',
            'tag' => 'required',
            'author' => 'required',
            'category' => 'required',
            'post_date' => 'required',
            'view' => 'required',
            'homepage_versions' => 'required',
            'choose_version' => 'required',
            'map_iframe' => 'required',
            'map_iframe_desc_placeholder' => 'required',
            'contact' => 'required',
            'add_contact' => 'required',
            'edit_contact' => 'required',
            'apps' => 'required',
            'add_app' => 'required',
            'edit_app' => 'required',
            'site_images' => 'required',
            'themes' => 'required',
            'choose_theme' => 'required',
            'animated_desc' => 'required',
            'top_title' => 'required',
            'skills' => 'required',
            'add_skill' => 'required',
            'edit_skill' => 'required',
            'section_title' => 'required',
            'percent_rate' => 'required',
            'add_service_item' => 'required',
            'edit_service_item' => 'required',
            'item' => 'required',
            'works' => 'required',
            'add_work' => 'required',
            'edit_work' => 'required',
            'likes' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        ContentFourGroupKeyword::firstOrCreate([
            'language_id' => $input['language_id'],
            'tag' => $input['tag'],
            'author' => $input['author'],
            'category' => $input['category'],
            'post_date' => $input['post_date'],
            'view' => $input['view'],
            'homepage_versions' => $input['homepage_versions'],
            'choose_version' => $input['choose_version'],
            'map_iframe' => $input['map_iframe'],
            'map_iframe_desc_placeholder' => $input['map_iframe_desc_placeholder'],
            'contact' => $input['contact'],
            'add_contact' => $input['add_contact'],
            'edit_contact' => $input['edit_contact'],
            'apps' => $input['apps'],
            'add_app' => $input['add_app'],
            'edit_app' => $input['edit_app'],
            'site_images' => $input['site_images'],
            'themes' => $input['themes'],
            'choose_theme' => $input['choose_theme'],
            'animated_desc' => $input['animated_desc'],
            'top_title' => $input['top_title'],
            'skills' => $input['skills'],
            'add_skill' => $input['add_skill'],
            'edit_skill' => $input['edit_skill'],
            'section_title' => $input['section_title'],
            'percent_rate' => $input['percent_rate'],
            'add_service_item' => $input['add_service_item'],
            'edit_service_item' => $input['edit_service_item'],
            'item' => $input['item'],
            'works' => $input['works'],
            'add_work' => $input['add_work'],
            'edit_work' => $input['edit_work'],
            'likes' => $input['likes'],
        ]);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.created_successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_content_four_group_keyword(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|integer',
            'tag' => 'required',
            'author' => 'required',
            'category' => 'required',
            'post_date' => 'required',
            'view' => 'required',
            'homepage_versions' => 'required',
            'choose_version' => 'required',
            'map_iframe' => 'required',
            'map_iframe_desc_placeholder' => 'required',
            'contact' => 'required',
            'add_contact' => 'required',
            'edit_contact' => 'required',
            'apps' => 'required',
            'add_app' => 'required',
            'edit_app' => 'required',
            'site_images' => 'required',
            'themes' => 'required',
            'choose_theme' => 'required',
            'animated_desc' => 'required',
            'top_title' => 'required',
            'skills' => 'required',
            'add_skill' => 'required',
            'edit_skill' => 'required',
            'section_title' => 'required',
            'percent_rate' => 'required',
            'add_service_item' => 'required',
            'edit_service_item' => 'required',
            'item' => 'required',
            'works' => 'required',
            'add_work' => 'required',
            'edit_work' => 'required',
            'likes' => 'required',
        ]);

        // Get All Request
        $input = $request->all();


        $content_four_group_keyword = ContentFourGroupKeyword::where('language_id', $id)->first();

        // Update to database
        ContentFourGroupKeyword::find($content_four_group_keyword->id)->update($input);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_content_five_group_keyword(Request $request)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|unique:content_five_group_keywords',
            'add_work_item' => 'required',
            'edit_work_item' => 'required',
            'work_items' => 'required',
            'call_to_action' => 'required',
            'galleries' => 'required',
            'add_gallery' => 'required',
            'edit_gallery' => 'required',
            'monthly' => 'required',
            'yearly' => 'required',
            'languages' => 'required',
            'add_language' => 'required',
            'edit_language' => 'required',
            'language_name' => 'required',
            'language_code' => 'required',
            'direction' => 'required',
            'keywords' => 'required',
            'for_admin_panel' => 'required',
            'for_frontend' => 'required',
            'content_group' => 'required',
            'menu' => 'required',
            'service_items' => 'required',
            'external_url' => 'required',
            'socials' => 'required',
            'add_social' => 'required',
            'edit_social' => 'required',
            'quick_access_buttons' => 'required',
            'email_or_phone' => 'required',
            'breadcrumb' => 'required',
            'color' => 'required',
            'color_code' => 'required',
            'ready_color_option' => 'required',
            'this_color_option_will_be_deleted' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        ContentFiveGroupKeyword::firstOrCreate([
            'language_id' => $input['language_id'],
            'add_work_item' => $input['add_work_item'],
            'edit_work_item' => $input['edit_work_item'],
            'work_items' => $input['work_items'],
            'call_to_action' => $input['call_to_action'],
            'galleries' => $input['galleries'],
            'add_gallery' => $input['add_gallery'],
            'edit_gallery' => $input['edit_gallery'],
            'monthly' => $input['monthly'],
            'yearly' => $input['yearly'],
            'languages' => $input['languages'],
            'add_language' => $input['add_language'],
            'edit_language' => $input['edit_language'],
            'language_name' => $input['language_name'],
            'language_code' => $input['language_code'],
            'direction' => $input['direction'],
            'keywords' => $input['keywords'],
            'for_admin_panel' => $input['for_admin_panel'],
            'for_frontend' => $input['for_frontend'],
            'content_group' => $input['content_group'],
            'menu' => $input['menu'],
            'service_items' => $input['service_items'],
            'external_url' => $input['external_url'],
            'socials' => $input['socials'],
            'add_social' => $input['add_social'],
            'edit_social' => $input['edit_social'],
            'quick_access_buttons' => $input['quick_access_buttons'],
            'email_or_phone' => $input['email_or_phone'],
            'breadcrumb' => $input['breadcrumb'],
            'color' => $input['color'],
            'color_code' => $input['color_code'],
            'ready_color_option' => $input['ready_color_option'],
            'this_color_option_will_be_deleted' => $input['this_color_option_will_be_deleted'],
        ]);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.created_successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_content_five_group_keyword(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|integer',
            'add_work_item' => 'required',
            'edit_work_item' => 'required',
            'work_items' => 'required',
            'call_to_action' => 'required',
            'galleries' => 'required',
            'add_gallery' => 'required',
            'edit_gallery' => 'required',
            'monthly' => 'required',
            'yearly' => 'required',
            'languages' => 'required',
            'add_language' => 'required',
            'edit_language' => 'required',
            'language_name' => 'required',
            'language_code' => 'required',
            'direction' => 'required',
            'keywords' => 'required',
            'for_admin_panel' => 'required',
            'for_frontend' => 'required',
            'content_group' => 'required',
            'menu' => 'required',
            'service_items' => 'required',
            'external_url' => 'required',
            'socials' => 'required',
            'add_social' => 'required',
            'edit_social' => 'required',
            'quick_access_buttons' => 'required',
            'email_or_phone' => 'required',
            'breadcrumb' => 'required',
            'color' => 'required',
            'color_code' => 'required',
            'ready_color_option' => 'required',
            'this_color_option_will_be_deleted' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        $content_five_group_keyword = ContentFiveGroupKeyword::where('language_id', $id)->first();

        // Update to database
        ContentFiveGroupKeyword::find($content_five_group_keyword->id)->update($input);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_content_six_group_keyword(Request $request)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|unique:content_six_group_keywords',
            'sections' => 'required',
            'hide' => 'required',
            'show' => 'required',
            'pages' => 'required',
            'add_page' => 'required',
            'edit_page' => 'required',
            'yes' => 'required',
            'no' => 'required',
            'display_footer_menu' => 'required',
            'display_dropdown' => 'required',
            'default_site_language' => 'required',
            'please_try_again' => 'required',
            'you_are_not_authorized' => 'required',
            'which_language' => 'required',
            'reminding' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'read_status' => 'required',
            'mark_all_as_read' => 'required',
            'mark' => 'required',
            'messages' => 'required',
            'testimonials' => 'required',
            'add_testimonial' => 'required',
            'edit_testimonial' => 'required',
            'comment' => 'required',
            'comments' => 'required',
            'approval_status' => 'required',
            'mark_all_as_approval' => 'required',
            'read' => 'required',
            'unread' => 'required',
            'profile' => 'required',
            'change_password' => 'required',
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
            'star' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        ContentSixGroupKeyword::firstOrCreate([
            'language_id' => $input['language_id'],
            'sections' => $input['sections'],
            'hide' => $input['hide'],
            'show' => $input['show'],
            'pages' => $input['pages'],
            'add_page' => $input['add_page'],
            'edit_page' => $input['edit_page'],
            'yes' => $input['yes'],
            'no' => $input['no'],
            'display_footer_menu' => $input['display_footer_menu'],
            'display_dropdown' => $input['display_dropdown'],
            'default_site_language' => $input['default_site_language'],
            'please_try_again' => $input['please_try_again'],
            'you_are_not_authorized' => $input['you_are_not_authorized'],
            'which_language' => $input['which_language'],
            'reminding' => $input['reminding'],
            'email' => $input['email'],
            'subject' => $input['subject'],
            'message' => $input['message'],
            'read_status' => $input['read_status'],
            'mark_all_as_read' => $input['mark_all_as_read'],
            'mark' => $input['mark'],
            'messages' => $input['messages'],
            'testimonials' => $input['testimonials'],
            'add_testimonial' => $input['add_testimonial'],
            'edit_testimonial' => $input['edit_testimonial'],
            'comment' => $input['comment'],
            'comments' => $input['comments'],
            'approval_status' => $input['approval_status'],
            'mark_all_as_approval' => $input['mark_all_as_approval'],
            'read' => $input['read'],
            'unread' => $input['unread'],
            'profile' => $input['profile'],
            'change_password' => $input['change_password'],
            'current_password' => $input['current_password'],
            'new_password' => $input['new_password'],
            'confirm_password' => $input['confirm_password'],
            'star' => $input['star'],
        ]);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.created_successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_content_six_group_keyword(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|integer',
            'sections' => 'required',
            'hide' => 'required',
            'show' => 'required',
            'pages' => 'required',
            'add_page' => 'required',
            'edit_page' => 'required',
            'yes' => 'required',
            'no' => 'required',
            'display_footer_menu' => 'required',
            'display_dropdown' => 'required',
            'default_site_language' => 'required',
            'please_try_again' => 'required',
            'you_are_not_authorized' => 'required',
            'which_language' => 'required',
            'reminding' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'read_status' => 'required',
            'mark_all_as_read' => 'required',
            'mark' => 'required',
            'messages' => 'required',
            'testimonials' => 'required',
            'add_testimonial' => 'required',
            'edit_testimonial' => 'required',
            'comment' => 'required',
            'comments' => 'required',
            'approval_status' => 'required',
            'mark_all_as_approval' => 'required',
            'read' => 'required',
            'unread' => 'required',
            'profile' => 'required',
            'change_password' => 'required',
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
            'star' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        $content_six_group_keyword = ContentSixGroupKeyword::where('language_id', $id)->first();

        // Update to database
        ContentSixGroupKeyword::find($content_six_group_keyword->id)->update($input);

        return redirect()->route('language-keyword-for-adminpanel.create', $input['language_id'])
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_frontend_one_group_keyword(Request $request)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|unique:frontend_one_group_keywords',
            'home' => 'required',
            'back_to_home' => 'required',
            'about' => 'required',
            'about_us' => 'required',
            'services' => 'required',
            'service_details' => 'required',
            'pricing' => 'required',
            'portfolio' => 'required',
            'work_details' => 'required',
            'blog' => 'required',
            'blogs' => 'required',
            'contact' => 'required',
            'monthly' => 'required',
            'yearly' => 'required',
            'annualy' => 'required',
            'admin' => 'required',
            'read_more' => 'required',
            'please_fill_required_fields' => 'required',
            'email_is_invalid' => 'required',
            'send_message' => 'required',
            'your_name' => 'required',
            'your_email' => 'required',
            'subject' => 'required',
            'your_message' => 'required',
            'your_comment' => 'required',
            'your_message_has_been_delivered' => 'required',
            'your_comment_is_pending_approval' => 'required',
            'help' => 'required',
            'contact_info' => 'required',
            'copyright' => 'required',
            'updating' => 'required',
            'all' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        FrontendOneGroupKeyword::firstOrCreate([
            'language_id' => $input['language_id'],
            'home' => $input['home'],
            'back_to_home' => $input['back_to_home'],
            'about' => $input['about'],
            'about_us' => $input['about_us'],
            'services' => $input['services'],
            'service_details' => $input['service_details'],
            'pricing' => $input['pricing'],
            'portfolio' => $input['portfolio'],
            'work_details' => $input['work_details'],
            'blog' => $input['blog'],
            'blogs' => $input['blogs'],
            'contact' => $input['contact'],
            'monthly' => $input['monthly'],
            'yearly' => $input['yearly'],
            'annualy' => $input['annualy'],
            'admin' => $input['admin'],
            'read_more' => $input['read_more'],
            'please_fill_required_fields' => $input['please_fill_required_fields'],
            'email_is_invalid' => $input['email_is_invalid'],
            'send_message' => $input['send_message'],
            'your_name' => $input['your_name'],
            'your_email' => $input['your_email'],
            'subject' => $input['subject'],
            'your_message' => $input['your_message'],
            'your_comment' => $input['your_comment'],
            'your_message_has_been_delivered' => $input['your_message_has_been_delivered'],
            'your_comment_is_pending_approval' => $input['your_comment_is_pending_approval'],
            'help' => $input['help'],
            'contact_info' => $input['contact_info'],
            'copyright' => $input['copyright'],
            'updating' => $input['updating'],
            'all' => $input['all'],
        ]);

        return redirect()->route('language-keyword-for-frontend.frontend_create', $input['language_id'])
            ->with('success', 'content.created_successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_frontend_one_group_keyword(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|integer',
            'home' => 'required',
            'back_to_home' => 'required',
            'about' => 'required',
            'about_us' => 'required',
            'services' => 'required',
            'service_details' => 'required',
            'pricing' => 'required',
            'portfolio' => 'required',
            'work_details' => 'required',
            'blog' => 'required',
            'blogs' => 'required',
            'contact' => 'required',
            'monthly' => 'required',
            'yearly' => 'required',
            'annualy' => 'required',
            'admin' => 'required',
            'read_more' => 'required',
            'please_fill_required_fields' => 'required',
            'email_is_invalid' => 'required',
            'send_message' => 'required',
            'your_name' => 'required',
            'your_email' => 'required',
            'subject' => 'required',
            'your_message' => 'required',
            'your_comment' => 'required',
            'your_message_has_been_delivered' => 'required',
            'your_comment_is_pending_approval' => 'required',
            'help' => 'required',
            'contact_info' => 'required',
            'copyright' => 'required',
            'updating' => 'required',
            'all' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        $frontend_one_group_keyword = FrontendOneGroupKeyword::where('language_id', $id)->first();

        // Update to database
        FrontendOneGroupKeyword::find($frontend_one_group_keyword->id)->update($input);

        return redirect()->route('language-keyword-for-frontend.frontend_create', $input['language_id'])
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_frontend_two_group_keyword(Request $request)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|unique:frontend_two_group_keywords',
            'recent_posts' => 'required',
            'by' => 'required',
            'pages' => 'required',
            'comments' => 'required',
            'reply' => 'required',
            'leave_a_comment' => 'required',
            'search' => 'required',
            'search_results' => 'required',
            'search_here' => 'required',
            'nothing_found' => 'required',
            'categories' => 'required',
            'links' => 'required',
            'contact_us' => 'required',
            'view_more' => 'required',
            'galleries' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        FrontendTwoGroupKeyword::firstOrCreate([
            'language_id' => $input['language_id'],
            'recent_posts' => $input['recent_posts'],
            'by' =>  $input['by'],
            'pages' =>  $input['pages'],
            'comments' => $input['comments'],
            'reply' => $input['reply'],
            'leave_a_comment' => $input['leave_a_comment'],
            'search' =>  $input['search'],
            'search_results' => $input['search_results'],
            'search_here' => $input['search_here'],
            'nothing_found' => $input['nothing_found'],
            'categories' => $input['categories'],
            'links' => $input['links'],
            'contact_us' => $input['contact_us'],
            'view_more' =>  $input['view_more'],
            'galleries' =>  $input['galleries'],
        ]);

        return redirect()->route('language-keyword-for-frontend.frontend_create', $input['language_id'])
            ->with('success', 'content.created_successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_frontend_two_group_keyword(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|integer',
            'recent_posts' => 'required',
            'by' => 'required',
            'pages' => 'required',
            'comments' => 'required',
            'reply' => 'required',
            'leave_a_comment' => 'required',
            'search' => 'required',
            'search_results' => 'required',
            'search_here' => 'required',
            'nothing_found' => 'required',
            'categories' => 'required',
            'links' => 'required',
            'contact_us' => 'required',
            'view_more' => 'required',
            'galleries' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        $frontend_two_group_keyword = FrontendTwoGroupKeyword::where('language_id', $id)->first();

        // Update to database
        FrontendTwoGroupKeyword::find($frontend_two_group_keyword->id)->update($input);

        return redirect()->route('language-keyword-for-frontend.frontend_create', $input['language_id'])
            ->with('success', 'content.updated_successfully');
    }

}
