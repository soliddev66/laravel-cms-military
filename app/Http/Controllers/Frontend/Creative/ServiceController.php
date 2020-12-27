<?php

namespace App\Http\Controllers\Frontend\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeBreadcrumb;
use App\Models\Admin\Creative\CreativeContact;
use App\Models\Admin\Creative\CreativeExternalUrl;
use App\Models\Admin\Creative\CreativeHomepageVersion;
use App\Models\Admin\Creative\CreativePage;
use App\Models\Admin\Creative\CreativeQuickAccessButton;
use App\Models\Admin\Creative\CreativeService;
use App\Models\Admin\Creative\CreativeServiceDetail;
use App\Models\Admin\Creative\CreativeSiteInfo;
use App\Models\Admin\Creative\CreativeSocial;

class ServiceController extends Controller
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

        $service = CreativeService::where('creative_services.status', 1)->where('creative_services.slug', '=', $slug)
            ->firstOrFail();

        $service_details = CreativeServiceDetail::where('creative_service_id', $service->id)->orderBy('order', 'asc')->get();

        return view('frontend.creative.service.show', compact('service', 'service_details',
            'homepage_version', 'breadcrumb', 'contacts', 'pages', 'quick_access_button',
            'external_url', 'general_socials', 'general_site_info'));
    }

}
