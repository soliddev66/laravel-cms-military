<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentFiveGroupKeyword extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'add_work_item',
        'edit_work_item',
        'work_items',
        'call_to_action',
        'galleries',
        'add_gallery',
        'edit_gallery',
        'monthly',
        'yearly',
        'languages',
        'add_language',
        'edit_language',
        'language_name',
        'language_code',
        'direction',
        'keywords',
        'for_admin_panel',
        'for_frontend',
        'content_group',
        'menu',
        'service_items',
        'external_url',
        'socials',
        'add_social',
        'edit_social',
        'quick_access_buttons',
        'email_or_phone',
        'breadcrumb',
        'color',
        'color_code',
        'ready_color_option',
        'this_color_option_will_be_deleted',
    ];
}
