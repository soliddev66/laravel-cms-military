<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'icon',
        'title',
        'currency',
        'price',
        'time',
        'desc',
        'btn_name',
        'btn_link',
        'order',
    ];
}
