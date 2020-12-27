<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontendTwoGroupKeyword extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'recent_posts',
        'by',
        'pages',
        'comments',
        'reply',
        'leave_a_comment',
        'search',
        'search_results',
        'search_here',
        'nothing_found',
        'categories',
        'links',
        'contact_us',
        'view_more',
        'galleries',
    ];

}
