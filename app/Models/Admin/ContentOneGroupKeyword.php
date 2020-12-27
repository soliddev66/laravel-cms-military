<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentOneGroupKeyword extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'fixed_content',
        'title',
        'desc',
        'btn_name',
        'btn_link',
        'thumbnail',
        'size',
        'recommended_size',
        'submit',
        'created_successfully',
        'updated_successfully',
        'deleted_successfully',
        'current_image',
        'not_yet_created',
        'background_image',
        'image',
        'sliders',
        'add_slider',
        'edit_slider',
        'delete',
        'close',
        'you_wont_be_able_to_revert_this',
        'cancel',
        'yes_delete_it',
        'order',
        'video',
        'about',
        'information_list',
        'add_info',
        'add_new',
        'edit_info',
        'action',
    ];
}
