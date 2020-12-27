<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentThreeGroupKeyword extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'link',
        'faqs',
        'add_faq',
        'edit_faq',
        'question',
        'answer',
        'site_info',
        'copyright',
        'favicon_image',
        'admin_logo_image',
        'admin_small_logo_image',
        'site_white_logo_image',
        'site_colored_logo_image',
        'google_analytic',
        'seo',
        'site_name',
        'site_desc',
        'site_keywords',
        'seperate_with_commas',
        'categories',
        'add_category',
        'edit_category',
        'category_name',
        'status',
        'select_your_option',
        'enable',
        'disable',
        'please_create_a_category',
        'blogs',
        'add_blog',
        'edit_blog',
        'short_desc',
    ];
}
