<?php

namespace App\Http\Controllers\Frontend\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeBreadcrumb;
use App\Models\Admin\Creative\CreativeContact;
use App\Models\Admin\Creative\CreativeExternalUrl;
use App\Models\Admin\Creative\CreativeHomepageVersion;
use App\Models\Admin\Creative\CreativePage;
use App\Models\Admin\Creative\CreativeQuickAccessButton;
use App\Models\Admin\Creative\CreativeSiteInfo;
use App\Models\Admin\Creative\CreativeSocial;
use App\Models\Admin\Creative\CreativeWork;
use App\Models\Admin\Creative\CreativeWorkDetail;
use App\Models\Admin\Creative\CreativeWorkSlider;

class WorkController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        // Get site language
        $language = getSiteLanguage();

        // Retrieving models
        $homepage_version = CreativeHomepageVersion::first();
        $breadcrumb = CreativeBreadcrumb::first();
        $contacts = CreativeContact::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $pages = CreativePage::where('language_id', $language->id)->where('status', 1)->orderBy('order', 'asc')->get();
        $quick_access_button = CreativeQuickAccessButton::first();
        $general_socials = CreativeSocial::where('status', 1)->get();
        $general_site_info = CreativeSiteInfo::where('language_id', $language->id)->first();
        $external_url = CreativeExternalUrl::where('language_id', $language->id)->first();

        $work = CreativeWork::where('creative_works.status', 1)->where('creative_works.work_slug', '=', $slug)
            ->firstOrFail();

        $work_details = CreativeWorkDetail::where('creative_work_id', $work->id)->orderBy('order', 'asc')->get();
        $work_sliders = CreativeWorkSlider::where('creative_work_id', $work->id)->get();

        return view('frontend.creative.work.show', compact('work', 'work_details', 'work_sliders',
            'homepage_version', 'breadcrumb', 'contacts', 'pages', 'quick_access_button', 'external_url',
            'general_socials', 'general_site_info'));
    }

}
