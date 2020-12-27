<?php

namespace App\Http\Controllers\Frontend\Landing;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Admin\App;
use App\Models\Admin\AppSection;
use App\Models\Admin\BackgroundImage;
use App\Models\Admin\Blog;
use App\Models\Admin\BlogSection;
use App\Models\Admin\Contact;
use App\Models\Admin\ContactSection;
use App\Models\Admin\Counter;
use App\Models\Admin\CounterSection;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\Faq;
use App\Models\Admin\FaqSection;
use App\Models\Admin\Feature;
use App\Models\Admin\FeatureSection;
use App\Models\Admin\FixedContent;
use App\Models\Admin\HomepageVersion;
use App\Models\Admin\HowToInstall;
use App\Models\Admin\HowToInstallSection;
use App\Models\Admin\Page;
use App\Models\Admin\Price;
use App\Models\Admin\PriceSection;
use App\Models\Admin\QuickAccessButton;
use App\Models\Admin\Screenshot;
use App\Models\Admin\ScreenshotSection;
use App\Models\Admin\Service;
use App\Models\Admin\ServiceSection;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Slider;
use App\Models\Admin\Social;
use App\Models\Admin\Team;
use App\Models\Admin\TeamSection;
use App\Models\Admin\Testimonial;
use App\Models\Admin\TestimonialSection;
use App\Models\Admin\Video;
use App\Models\Admin\InfoList;
use App\Models\Admin\User;

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
        $homepage_version = HomepageVersion::first();
        $fixed_content = FixedContent::where('language_id', $language->id)->first();
        $bg_image = BackgroundImage::first();
        $sliders = Slider::orderBy('order', 'asc')->get();
        $video = Video::first();
        $about = About::where('language_id', $language->id)->first();
        $info_lists = InfoList::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $service_section = ServiceSection::where('language_id', $language->id)->first();
        $services = Service::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $feature_section = FeatureSection::where('language_id', $language->id)->first();
        $features = Feature::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $counter_section = CounterSection::where('language_id', $language->id)->first();
        $counters = Counter::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $install_section = HowToInstallSection::where('language_id', $language->id)->first();
        $installs = HowToInstall::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $screenshot_section = ScreenshotSection::where('language_id', $language->id)->first();
        $screenshots = Screenshot::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $price_section = PriceSection::where('language_id', $language->id)->first();
        $prices = Price::where('language_id', $language->id)->orderBy('order', 'asc')->get();

        $team_section = TeamSection::where('language_id', $language->id)->first();
        $teams = Team::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $faq_section = FaqSection::where('language_id', $language->id)->first();
        $faqs = Faq::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $blog_section = BlogSection::where('language_id', $language->id)->first();
        $recent_posts = Blog::join("categories", 'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 1)
            ->orderBy('blogs.id', 'desc')
            ->take(6)
            ->get();
        $testimonial_section = TestimonialSection::where('language_id', $language->id)->first();
        $testimonials = Testimonial::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $contact_section = ContactSection::where('language_id', $language->id)->first();
        $contacts = Contact::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $app_section = AppSection::where('language_id', $language->id)->first();
        $apps = App::orderBy('order', 'asc')->get();
        $pages = Page::where('language_id', $language->id)->where('status', 1)->orderBy('order', 'asc')->get();
        $quick_access_button = QuickAccessButton::first();
        $external_url = ExternalUrl::where('language_id', $language->id)->first();
        $general_socials = Social::where('status', 1)->get();
        $general_site_info = SiteInfo::where('language_id', $language->id)->first();





        return view('frontend.landing.home.index', compact('homepage_version', 'fixed_content',
            'bg_image', 'sliders', 'video', 'about', 'info_lists', 'service_section', 'services',
            'feature_section', 'features', 'counter_section', 'counters', 'install_section', 'installs',
            'screenshot_section', 'screenshots', 'price_section', 'prices',
            'team_section', 'teams', 'faq_section', 'faqs', 'blog_section', 'recent_posts',
            'contact_section', 'contacts', 'app_section', 'apps', 'pages', 'quick_access_button', 'external_url',
            'testimonial_section', 'testimonials', 'general_socials', 'general_site_info'));
       
        // return redirect()->route('blog-page.index');

        
    }

}
