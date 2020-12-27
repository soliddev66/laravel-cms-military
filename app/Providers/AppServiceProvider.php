<?php

namespace App\Providers;

use App\Models\Admin\Creative\CreativeGoogleAnalytic;
use App\Models\Admin\Creative\CreativeMessage;
use App\Models\Admin\Creative\CreativeSection;
use App\Models\Admin\Creative\CreativeSeo;
use App\Models\Admin\Creative\CreativeSiteImage;
use App\Models\Admin\Creative\CreativeSiteInfo;
use App\Models\Admin\Creative\CreativeSocial;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\Language;
use App\Models\Admin\Message;
use App\Models\Admin\Section;
use App\Models\Admin\Seo;
use App\Models\Admin\SiteImage;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;
use App\Models\Admin\Theme;
use App\Models\Frontend\Comment;
use App\Models\Frontend\Creative\CreativeComment;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // Allows using Bootstrap 4.x for paging. Normally Tailwindcss.
        Paginator::useBootstrap();

        if (Schema::hasTable('languages')) {

            // Retrieve a models
            $languages = Language::get();
            $display_dropdowns = Language::where('display_dropdown', 1)->get();
            $data_language = Language::where('status', 1)->first();

            View::share('languages', $languages);
            View::share('display_dropdowns', $display_dropdowns);
            View::share('data_language', $data_language);

        }

        if (Schema::hasTable('themes')) {

            $language = Language::where('default_site_language', 1)->first();

            if (isset($language)) {

                View::share('language', $language);

            }

            // Retrieve the first model
            $theme = Theme::first();
            View::share('theme', $theme);

            if (isset($theme)) {

                if ($theme->choose_theme == 0) {

                    if (Schema::hasTable('site_images')) {
                        // Retrieve the first model
                        $general_site_image = SiteImage::first();
                        View::share('general_site_image', $general_site_image);
                    }

                    if (Schema::hasTable('google_analytics')) {
                        // Retrieve the first model
                        $google_analytic = GoogleAnalytic::first();
                        View::share('google_analytic', $google_analytic);
                    }

                    if (Schema::hasTable('seos')) {
                        // Retrieve the first model
                        $general_seo = Seo::first();
                        View::share('general_seo', $general_seo);
                    }

                    if (Schema::hasTable('sections')) {
                        // Retrieve the first model
                        $sections = Section::all();

                        if (count($sections) > 0) {
                            // For Section Enable/Disable
                            foreach ($sections as $section) {
                                $section_arr[$section->section] = $section->status;
                            }

                            View::share('section_arr', $section_arr);
                        }
                    }

                    if (Schema::hasTable('messages')) {
                        // Retrieve messages
                        $general_unread_messages = Message::where('read', 0)->orderBy('id', 'desc')->take(4)->get();
                        $general_unread_message_count = Message::where('read', 0)->get();
                        View::share('general_unread_messages', $general_unread_messages);
                        View::share('general_unread_message_count', $general_unread_message_count);
                    }

                    if (Schema::hasTable('comments')) {
                        // Retrieve messages
                        $general_unread_comments = Comment::where('approval', 0)->orderBy('id', 'desc')->take(4)->get();
                        $general_unread_comment_count = Comment::where('approval', 0)->get();
                        View::share('general_unread_comments', $general_unread_comments);
                        View::share('general_unread_comment_count', $general_unread_comment_count);
                    }


                } else {

                    if (Schema::hasTable('creative_site_infos')) {
                        // Retrieve the first model
                        $general_site_info = CreativeSiteInfo::where('language_id', $language->id)->first();
                        View::share('general_site_info', $general_site_info);
                    }

                    if (Schema::hasTable('creative_socials')) {
                        // Retrieve the first model
                        $general_socials = CreativeSocial::where('status', 1)->get();
                        View::share('general_socials', $general_socials);
                    }

                    if (Schema::hasTable('creative_site_images')) {
                        // Retrieve the first model
                        $general_site_image = CreativeSiteImage::first();
                        View::share('general_site_image', $general_site_image);
                    }

                    if (Schema::hasTable('creative_google_analytics')) {
                        // Retrieve the first model
                        $google_analytic = CreativeGoogleAnalytic::first();
                        View::share('google_analytic', $google_analytic);
                    }

                    if (Schema::hasTable('creative_seos')) {
                        // Retrieve the first model
                        $general_seo = CreativeSeo::first();
                        View::share('general_seo', $general_seo);
                    }

                    if (Schema::hasTable('creative_sections')) {
                        // Retrieve the first model
                        $sections = CreativeSection::all();

                        if (count($sections) > 0) {
                            // For Section Enable/Disable
                            foreach ($sections as $section) {
                                $section_arr[$section->section] = $section->status;
                            }

                            View::share('section_arr', $section_arr);
                        }
                    }

                    if (Schema::hasTable('creative_messages')) {
                        // Retrieve messages
                        $general_unread_messages = CreativeMessage::where('read', 0)->orderBy('id', 'desc')->take(4)->get();
                        $general_unread_message_count = CreativeMessage::where('read', 0)->get();
                        View::share('general_unread_messages', $general_unread_messages);
                        View::share('general_unread_message_count', $general_unread_message_count);
                    }

                    if (Schema::hasTable('creative_comments')) {
                        // Retrieve messages
                        $general_unread_comments = CreativeComment::where('approval', 0)->orderBy('id', 'desc')->take(4)->get();
                        $general_unread_comment_count = CreativeComment::where('approval', 0)->get();
                        View::share('general_unread_comments', $general_unread_comments);
                        View::share('general_unread_comment_count', $general_unread_comment_count);
                    }

                }

            }

        }


    }
}
