<?php

namespace App\Http\Controllers\Frontend\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeAbout;
use App\Models\Admin\Creative\CreativeBackgroundImage;
use App\Models\Admin\Creative\CreativeBlog;
use App\Models\Admin\Creative\CreativeBlogSection;
use App\Models\Admin\Creative\CreativeCallToAction;
use App\Models\Admin\Creative\CreativeCategory;
use App\Models\Admin\Creative\CreativeContact;
use App\Models\Admin\Creative\CreativeContactSection;
use App\Models\Admin\Creative\CreativeCounter;
use App\Models\Admin\Creative\CreativeExternalUrl;
use App\Models\Admin\Creative\CreativeFixedContent;
use App\Models\Admin\Creative\CreativeGallery;
use App\Models\Admin\Creative\CreativeGallerySection;
use App\Models\Admin\Creative\CreativeHomepageVersion;
use App\Models\Admin\Creative\CreativePage;
use App\Models\Admin\Creative\CreativePrice;
use App\Models\Admin\Creative\CreativePriceSection;
use App\Models\Admin\Creative\CreativeQuickAccessButton;
use App\Models\Admin\Creative\CreativeService;
use App\Models\Admin\Creative\CreativeServiceSection;
use App\Models\Admin\Creative\CreativeSiteInfo;
use App\Models\Admin\Creative\CreativeSkill;
use App\Models\Admin\Creative\CreativeSkillSection;
use App\Models\Admin\Creative\CreativeSlider;
use App\Models\Admin\Creative\CreativeSocial;
use App\Models\Admin\Creative\CreativeTeam;
use App\Models\Admin\Creative\CreativeTeamSection;
use App\Models\Admin\Creative\CreativeTestimonial;
use App\Models\Admin\Creative\CreativeTestimonialSection;
use App\Models\Admin\Creative\CreativeVideo;
use App\Models\Admin\Creative\CreativeWork;
use App\Models\Admin\Creative\CreativeWorkSection;
use App\Models\Admin\Creative\CreativeInfoList;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Get site language
        $language = getSiteLanguage();

        // Retrieve models
        $homepage_version = CreativeHomepageVersion::first();
        $fixed_content = CreativeFixedContent::where('language_id', $language->id)->first();
        $bg_image = CreativeBackgroundImage::first();
        $sliders = CreativeSlider::orderBy('order', 'asc')->get();
        $video = CreativeVideo::first();
        $about = CreativeAbout::where('language_id', $language->id)->first();
        $info_lists = CreativeInfoList::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $skill_section = CreativeSkillSection::where('language_id', $language->id)->first();
        $skills = CreativeSkill::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $counters = CreativeCounter::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $service_section = CreativeServiceSection::where('language_id', $language->id)->first();
        $services = CreativeService::where('language_id', $language->id)->where('status', 1)->orderBy('order', 'asc')->get();

        $work_section = CreativeWorkSection::where('language_id', $language->id)->first();
        $works = CreativeWork::join("creative_categories",'creative_categories.id', '=', 'creative_works.creative_category_id')
            ->where('creative_works.language_id', $language->id)
            ->where('creative_categories.status', 1)
            ->orderBy('creative_works.id', 'desc')
            ->get();
        $grouped_work_categories = CreativeCategory::orderBy('order', 'asc')
            ->get()
            ->where('language_id', $language->id)
            ->where('status', 1)
            ->groupBy('category_name');


        $call_to_action_section = CreativeCallToAction::where('language_id', $language->id)->first();
        $testimonial_section = CreativeTestimonialSection::where('language_id', $language->id)->first();
        $testimonials = CreativeTestimonial::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $gallery_section = CreativeGallerySection::where('language_id', $language->id)->first();
        $galleries = CreativeGallery::orderBy('order', 'asc')
            ->take(4)
            ->get();
        $team_section = CreativeTeamSection::where('language_id', $language->id)->first();
        $teams = CreativeTeam::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $price_section = CreativePriceSection::where('language_id', $language->id)->first();
        $monthly_prices = CreativePrice::where('language_id', $language->id)->where('time', 1)->orderBy('order', 'asc')->get();
        $annualy_prices = CreativePrice::where('language_id', $language->id)->where('time', 0)->orderBy('order', 'asc')->get();
        $blog_section = CreativeBlogSection::where('language_id', $language->id)->first();
        $recent_posts = CreativeBlog::join("creative_blog_categories", 'creative_blog_categories.id', '=', 'creative_blogs.category_id')
            ->where('creative_blog_categories.language_id', $language->id)
            ->where('creative_blog_categories.status', 1)
            ->orderBy('creative_blogs.id', 'desc')
            ->take(6)
            ->get();


        $contact_section = CreativeContactSection::where('language_id', $language->id)->first();
        $contacts = CreativeContact::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $pages = CreativePage::where('language_id', $language->id)->where('status', 1)->orderBy('order', 'asc')->get();
        $quick_access_button = CreativeQuickAccessButton::first();
        $external_url = CreativeExternalUrl::where('language_id', $language->id)->first();
        $general_socials = CreativeSocial::where('status', 1)->get();
        $general_site_info = CreativeSiteInfo::where('language_id', $language->id)->first();


        return view('frontend.creative.home.index', compact('homepage_version','fixed_content',
            'bg_image', 'sliders', 'video', 'about', 'info_lists', 'skill_section', 'skills', 'counters',
            'service_section', 'services', 'work_section', 'works', 'grouped_work_categories',
            'call_to_action_section', 'testimonial_section', 'testimonials', 'gallery_section', 'galleries',
            'team_section', 'teams', 'price_section', 'monthly_prices', 'blog_section', 'recent_posts',
            'annualy_prices', 'contact_section', 'contacts', 'pages', 'quick_access_button', 'external_url',
            'general_socials', 'general_site_info'));
    }

}
