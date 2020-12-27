<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Creative\CreativeBlog;
use App\Models\Admin\Creative\CreativeService;
use App\Models\Admin\Creative\CreativeWork;
use App\Http\Middleware\IsSuperAdmin;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware("is_Super_Admin"); //Our Middleware
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models for Landing Site
        $blogs_count = Blog::all()->count();

        // Retrieving models for Creative Site
        $creative_services_count = CreativeService::all()->count();
        $creative_blogs_count = CreativeBlog::all()->count();
        $creative_works_count = CreativeWork::all()->count();

        return view('admin.dashboard', compact('blogs_count', 'creative_services_count',
            'creative_blogs_count', 'creative_works_count'));

    }

}
