<?php

namespace App\Http\Controllers\Frontend\Landing;

use App\Http\Controllers\Controller;
use App\Models\Admin\Breadcrumb;
use App\Models\Admin\Contact;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\HomepageVersion;
use App\Models\Admin\Page;
use App\Models\Admin\QuickAccessButton;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;

class PageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($page_slug)
    {
        // Get site language
        $language = getSiteLanguage();

        // Retrieving models
        $homepage_version = HomepageVersion::first();
        $contacts = Contact::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $pages = Page::where('language_id', $language->id)->where('status', 1)->orderBy('order', 'asc')->get();
        $quick_access_button = QuickAccessButton::first();
        $external_url = ExternalUrl::where('language_id', $language->id)->first();
        $general_socials = Social::where('status', 1)->get();
        $general_site_info = SiteInfo::where('language_id', $language->id)->first();
        $breadcrumb = Breadcrumb::first();
        $page = Page::where('pages.page_slug', '=', $page_slug)
            ->firstOrFail();

        return view('frontend.landing.page.show', compact('page', 'homepage_version',
            'contacts', 'pages', 'quick_access_button', 'external_url', 'breadcrumb',
            'general_socials', 'general_site_info'));
    }

}
