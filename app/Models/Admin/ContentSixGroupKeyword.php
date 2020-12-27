<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentSixGroupKeyword extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'sections',
        'hide',
        'show',
        'pages',
        'add_page',
        'edit_page',
        'yes',
        'no',
        'display_footer_menu',
        'display_dropdown',
        'default_site_language',
        'please_try_again',
        'you_are_not_authorized',
        'which_language',
        'reminding',
        'email',
        'subject',
        'message',
        'read_status',
        'mark_all_as_read',
        'mark',
        'messages',
        'read_status',
        'mark_all_as_read',
        'mark',
        'messages',
        'testimonials',
        'add_testimonial',
        'edit_testimonial',
        'comment',
        'comments',
        'approval_status',
        'mark_all_as_approval',
        'read',
        'unread',
        'profile',
        'change_password',
        'current_password',
        'new_password',
        'confirm_password',
        'star',

    ];

}
