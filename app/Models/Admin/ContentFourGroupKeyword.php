<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentFourGroupKeyword extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'tag',
        'author',
        'category',
        'post_date',
        'view',
        'homepage_versions',
        'choose_version',
        'map_iframe',
        'map_iframe_desc_placeholder',
        'contact',
        'add_contact',
        'edit_contact',
        'apps',
        'add_app',
        'edit_app',
        'site_images',
        'themes',
        'choose_theme',
        'animated_desc',
        'top_title',
        'skills',
        'add_skill',
        'edit_skill',
        'section_title',
        'percent_rate',
        'add_service_item',
        'edit_service_item',
        'item',
        'works',
        'add_work',
        'edit_work',
        'likes',
    ];
}
