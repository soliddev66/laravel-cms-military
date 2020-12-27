<?php

namespace App\Http\Controllers\Frontend\Landing;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Breadcrumb;
use App\Models\Admin\Category;
use App\Models\Admin\Contact;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\HomepageVersion;
use App\Models\Admin\Page;
use App\Models\Admin\QuickAccessButton;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;
use App\Models\Frontend\Comment;
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
        $homepage_version = HomepageVersion::first();
        $contacts = Contact::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $pages = Page::where('language_id', $language->id)->where('status', 1)->orderBy('order', 'asc')->get();
        $quick_access_button = QuickAccessButton::first();
        $external_url = ExternalUrl::where('language_id', $language->id)->first();
        $general_socials = Social::where('status', 1)->get();
        $general_site_info = SiteInfo::where('language_id', $language->id)->first();
        $breadcrumb = Breadcrumb::first();

        $categories =  Category::where('language_id', $language->id)
                    ->where('status', 1)
                    ->where('parent_id', 0)
                    ->orderBy('id', 'desc')
                    ->paginate(6);
        $blogs = Blog::join("categories",'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 1)
            ->orderBy('blogs.id', 'desc')
            ->paginate(6);
        
        $username = auth()->user()->name;

        return view('frontend.landing.blog.index', compact( 'username', 'categories', 'homepage_version', 'contacts', 'pages',
            'quick_access_button', 'external_url', 'general_socials', 'general_site_info', 'breadcrumb'));
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
        $homepage_version = HomepageVersion::first();
        $contacts = Contact::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $pages = Page::where('language_id', $language->id)->where('status', 1)->orderBy('order', 'asc')->get();
        $quick_access_button = QuickAccessButton::first();
        $external_url = ExternalUrl::where('language_id', $language->id)->first();
        $general_socials = Social::where('status', 1)->get();
        $general_site_info = SiteInfo::where('language_id', $language->id)->first();
        $breadcrumb = Breadcrumb::first();
        $blog = Blog::where('blogs.slug', '=', $slug)
            ->firstOrFail();
        $recent_posts = Blog::join("categories", 'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 1)
            ->orderBy('blogs.id', 'desc')
            ->take(3)
            ->get();

        if(isset($blog)){
            // Update view column
            Blog::find($blog->id)->update(
                ['view' => $blog->view + 1]
            );
        }

        $comments = Comment::where('blog_id', '=', $blog->id)->where('approval', '=', 1)->get();

        $blog_count_categories = Blog::select(DB::raw('count(*) as category_count, category_id'))
            ->where('language_id', $language->id)
            ->groupBy('category_id')
            ->get();

        return view('frontend.landing.blog.detail-show', compact('blog', 'blog_count_categories',
            'recent_posts', 'homepage_version', 'contacts', 'pages', 'quick_access_button', 'external_url',
            'breadcrumb', 'comments', 'general_socials', 'general_site_info'));
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
        $homepage_version = HomepageVersion::first();
        $contacts = Contact::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $pages = Page::where('language_id', $language->id)->where('status', 1)->orderBy('order', 'asc')->get();
        $quick_access_button = QuickAccessButton::first();
        $external_url = ExternalUrl::where('language_id', $language->id)->first();
        $general_socials = Social::where('status', 1)->get();
        $general_site_info = SiteInfo::where('language_id', $language->id)->first();
        $breadcrumb = Breadcrumb::first();

        //Get Sub Catergory
        $category =  Category::where('category_slug', '=', $category_name)->firstOrFail();
        $childCatergories =  Category::where('parent_id', '=', $category->id)->paginate(6);

        //Get Blogs
        $blogs = Blog::join("categories",'categories.id', '=', 'blogs.category_id')
            ->where('categories.category_slug', '=', $category_name)
            ->orderBy('blogs.id', 'desc')
            ->paginate(6);

        if(count($childCatergories) == 0 && count($blogs) == 0){

            return view('frontend.landing.blog.detail-category', compact('category',
                'homepage_version', 'contacts', 'pages', 'quick_access_button', 'external_url', 'breadcrumb',
                'general_socials', 'general_site_info'));
        }

        return view('frontend.landing.blog.category-show', compact('blogs', 'category', 'childCatergories',
            'homepage_version', 'contacts', 'pages', 'quick_access_button', 'external_url', 'breadcrumb',
            'general_socials', 'general_site_info'));
    }

    public function category_detail($category_name)
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

        //Get Sub Catergory
        $category =  Category::where('category_slug', '=', $category_name)->firstOrFail();

        return view('frontend.landing.blog.detail-category', compact('category',
            'homepage_version', 'contacts', 'pages', 'quick_access_button', 'external_url', 'breadcrumb',
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
        $homepage_version = HomepageVersion::first();
        $contacts = Contact::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $pages = Page::where('language_id', $language->id)->where('status', 1)->orderBy('order', 'asc')->get();
        $quick_access_button = QuickAccessButton::first();
        $external_url = ExternalUrl::where('language_id', $language->id)->first();
        $general_socials = Social::where('status', 1)->get();
        $general_site_info = SiteInfo::where('language_id', $language->id)->first();
        $breadcrumb = Breadcrumb::first();

        // Search
        $search = $request->get('search');

        $blogs = Blog::join("categories",'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 1)
            ->where('title', 'like', '%'.$search.'%')
            ->orderBy('blogs.id', 'desc')
            ->get();

        return view('frontend.landing.blog.search-index', compact ('blogs', 'homepage_version',
            'contacts', 'pages', 'quick_access_button', 'external_url', 'breadcrumb', 'general_socials', 'general_site_info'));
    }

}
