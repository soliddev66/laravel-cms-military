<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontendOneGroupKeyword extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'home',
        'back_to_home',
        'about',
        'about_us',
        'services',
        'service_details',
        'pricing',
        'portfolio',
        'work_details',
        'blog',
        'blogs',
        'contact',
        'monthly',
        'yearly',
        'annualy',
        'admin',
        'read_more',
        'please_fill_required_fields',
        'email_is_invalid',
        'send_message',
        'your_name',
        'your_email',
        'subject',
        'your_message',
        'your_comment',
        'your_message_has_been_delivered',
        'your_comment_is_pending_approval',
        'help',
        'contact_info',
        'copyright',
        'updating',
        'all',
    ];

}
