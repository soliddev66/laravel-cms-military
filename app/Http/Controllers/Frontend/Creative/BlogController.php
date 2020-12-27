<?php

namespace App\Http\Controllers\Frontend\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeBlog;
use App\Models\Admin\Creative\CreativeBlogCategory;
use App\Models\Admin\Creative\CreativeBreadcrumb;
use App\Models\Admin\Creative\CreativeContact;
use App\Models\Admin\Creative\CreativeHomepageVersion;
use App\Models\Admin\Creative\CreativePage;
use App\Models\Admin\Creative\CreativeQuickAccessButton;
use App\Models\Admin\Creative\CreativeSiteInfo;
use App\Models\Admin\Creative\CreativeSocial;
use App\Models\Frontend\Creative\CreativeComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
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

        // Retrieving models
        $homepage_version = CreativeHomepageVersion::first();
        $contacts = CreativeContact::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $pages = CreativePage::where('language_id', $language->id)->where('status', 1)->orderBy('order', 'asc')->get();
        $quick_access_button = CreativeQuickAccessButton::first();
        $general_socials = CreativeSocial::where('status', 1)->get();
        $general_site_info = CreativeSiteInfo::where('language_id', $language->id)->first();
        $breadcrumb = CreativeBreadcrumb::first();
        $blogs = CreativeBlog::join("creative_blog_categories",'creative_blog_categories.id', '=', 'creative_blogs.category_id')
            ->where('creative_blog_categories.language_id', $language->id)
            ->where('creative_blog_categories.status', 1)
            ->orderBy('creative_blogs.id', 'desc')
            ->paginate(6);

        return view('frontend.creative.blog.index', compact( 'blogs', 'contacts', 'pages',
            'homepage_version', 'quick_access_button', 'breadcrumb', 'general_socials', 'general_site_info'));
    }

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
        $contacts = CreativeContact::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $pages = CreativePage::where('language_id', $language->id)->where('status', 1)->orderBy('order', 'asc')->get();
        $quick_access_button = CreativeQuickAccessButton::first();
        $general_socials = CreativeSocial::where('status', 1)->get();
        $general_site_info = CreativeSiteInfo::where('language_id', $language->id)->first();
        $breadcrumb = CreativeBreadcrumb::first();
        $blog = CreativeBlog::where('creative_blogs.slug', '=', $slug)
            ->firstOrFail();
        $recent_posts = CreativeBlog::join("creative_blog_categories", 'creative_blog_categories.id', '=', 'creative_blogs.category_id')
            ->where('creative_blog_categories.language_id', $language->id)
            ->where('creative_blog_categories.status', 1)
            ->orderBy('creative_blogs.id', 'desc')
            ->take(3)
            ->get();

        if(isset($blog)){
            // Update view column
            CreativeBlog::find($blog->id)->update(
                ['view' => $blog->view + 1]
            );
        }

        $comments = CreativeComment::where('creative_blog_id', '=', $blog->id)->where('approval', '=', 1)->get();

        $blog_count_categories = CreativeBlog::select(DB::raw('count(*) as category_count, category_id'))
            ->where('language_id', $language->id)
            ->groupBy('category_id')
            ->get();

        return view('frontend.creative.blog.show', compact('blog', 'blog_count_categories',
            'homepage_version', 'recent_posts', 'contacts', 'pages', 'quick_access_button', 'breadcrumb',
            'comments', 'general_socials', 'general_site_info'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $category_name
     * @return \Illuminate\Http\Response
     */
    public function category_show($category_name)
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
        $blogs = CreativeBlog::join("creative_blog_categories",'creative_blog_categories.id', '=', 'creative_blogs.category_id')
            ->where('creative_blog_categories.language_id', $language->id)
            ->where('creative_blog_categories.category_slug', '=', $category_name)
            ->orderBy('creative_blogs.id', 'desc')
            ->paginate(6);
        $category = CreativeBlogCategory::where('category_slug', '=', $category_name)->first();

        if (count($blogs) < 1) {
            abort(404);
        }

        return view('frontend.creative.blog.category-show', compact('blogs', 'category',
            'homepage_version', 'contacts', 'pages', 'quick_access_button', 'breadcrumb',
            'general_socials', 'general_site_info'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
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

        // Search
        $search = $request->get('search');

        $blogs = CreativeBlog::join("creative_blog_categories", 'creative_blog_categories.id', '=', 'creative_blogs.category_id')
            ->where('creative_blog_categories.language_id', $language->id)
            ->where('creative_blog_categories.status', 1)
            ->where('title', 'like', '%'.$search.'%')
            ->orderBy('creative_blogs.id', 'desc')
            ->get();

        return view('frontend.creative.blog.search-index', compact ('blogs', 'homepage_version',
            'contacts', 'pages', 'quick_access_button', 'breadcrumb', 'general_socials', 'general_site_info'));
    }
}
