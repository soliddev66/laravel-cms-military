<?php

namespace App\Http\Controllers\Frontend\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeBreadcrumb;
use App\Models\Admin\Creative\CreativeContact;
use App\Models\Admin\Creative\CreativeGallery;
use App\Models\Admin\Creative\CreativeHomepageVersion;
use App\Models\Admin\Creative\CreativePage;
use App\Models\Admin\Creative\CreativeQuickAccessButton;
use App\Models\Admin\Creative\CreativeSiteInfo;
use App\Models\Admin\Creative\CreativeSocial;

class GalleryController extends Controller
{
    public function index()
    {
        // Get site language
        $language = getSiteLanguage();

        // Retrieving models
        $homepage_version = CreativeHomepageVersion::first();
        $contacts = CreativeContact::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $pages = CreativePage::where('language_id', $language->id)->where('status', 1)->orderBy('order', 'asc')->get();
        $quick_access_button = CreativeQuickAccessButton::first();
        $general_socials = CreativeSocial::where('status', 1)->get();
        $general_site_info = CreativeSiteInfo::where('language_id', $language->id)->first();
        $breadcrumb = CreativeBreadcrumb::first();
        $galleries = CreativeGallery::orderBy('order', 'asc')
            ->paginate(9);

        return view('frontend.creative.gallery.index', compact( 'galleries', 'contacts', 'pages',
            'homepage_version', 'quick_access_button', 'breadcrumb', 'general_socials', 'general_site_info'));
    }

}
