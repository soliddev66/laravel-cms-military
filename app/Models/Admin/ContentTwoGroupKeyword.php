<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentTwoGroupKeyword extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'services',
        'add_service',
        'edit_service',
        'icon',
        'section_title_and_desc',
        'features',
        'add_feature',
        'edit_feature',
        'add_counter',
        'edit_counter',
        'timer',
        'counters',
        'how_to_install',
        'add_how_to_install',
        'video_link',
        'edit_how_to_install',
        'screenshots',
        'add_screenshot',
        'edit_screenshot',
        'prices',
        'add_price',
        'edit_price',
        'currency',
        'price',
        'time',
        'badge',
        'please_take_with_features_semicolon',
        'teams',
        'add_team',
        'edit_team',
        'name',
        'job',
    ];
}
