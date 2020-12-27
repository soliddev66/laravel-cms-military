<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuKeyword extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'banner',
        'fixed_content',
        'background_image',
        'sliders',
        'video',
        'about',
        'services',
        'features',
        'counters',
        'how_to_install',
        'screenshots',
        'prices',
        'teams',
        'faqs',
        'site_info',
        'site_images',
        'homepage_versions',
        'google_analytic',
        'sections',
        'color',
        'seo',
        'categories',
        'blogs',
        'contact',
        'contact_info',
        'apps',
        'settings',
        'themes',
        'languages',
        'logout',
        'skills',
        'works',
        'call_to_action',
        'galleries',
        'external_url',
        'socials',
        'quick_access_buttons',
        'breadcrumb',
        'pages',
        'messages',
        'testimonials',
        'notifications',
        'profile',
        'change_password',
        'data_language',
        'dashboard',
        'optimizer',
        'user_management',
    ];
}
