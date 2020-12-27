<?php

namespace App\Models\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'category_slug' => [
                'source' => 'category_name',
                'maxLength'          => null,
                'maxLengthKeepWords' => true,
                'method'             => null,
                'separator'          => '-',
                'unique'             => true,
                'uniqueSuffix'       => null,
                'includeTrashed'     => false,
                'reserved'           => null,
                'onUpdate'           => false
            ]
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'category_name',
        'parent_id',
        'short_desc',
        'desc',
        'category_image',
        'order',
        'status',
        'category_slug',
    ];

    /**
     * Get the index name for the model.
     *
     * @return string
    */
    public function parent()
    {
       return $this->hasMany('App\Models\Admin\Category', 'id', 'parent_id');
    }
    public function children()
    {
       return $this->hasMany('App\Models\Admin\Category', 'parent_id');
    }


    
}
