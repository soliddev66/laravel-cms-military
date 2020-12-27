<?php

namespace App\Models\Frontend\Creative;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreativeComment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'creative_blog_id',
        'name',
        'comment',
        'approval',
    ];

    /**
     * Get the post that owns the comment.
     */
    public function creative_blog()
    {
        return $this->belongsTo('App\Models\Admin\Creative\CreativeBlog', 'creative_blog_id', 'id');
    }
}
