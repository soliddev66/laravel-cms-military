<?php

use App\Models\Admin\Language;
use App\Models\Admin\Category;
/**
 * Created by PhpStorm.
 * User: user
 * Date: 28.09.2020
 * Time: 19:30
 */

// Get language for create data
function getLanguage() {

    // Retrieve active langauage
    $language = Language::where('status', 1)->first();

    return $language;

}

// Get site Language
function getSiteLanguage() {

    if (session()->has('language_id_from_dropdown')) {

        $language_id_from_dropdown = session()->get('language_id_from_dropdown');

        $language = Language::find($language_id_from_dropdown);

        return $language;

    } else {

        $language = Language::where('default_site_language', 1)->first();

        return $language;
    }
}

function generateCategories($categories, $pass = 0)
{
    foreach ($categories as $category) {
        if ($category->parent_id == 0) {
            echo '<option class="parent" value="' . $category->id .'">' . str_repeat("&nbsp;&nbsp;", $pass) .$category->category_name .'</option>' ;
        }else{
            echo '<option class="child-' . $category->parent_id . '" value="' . $category->id .'">' . str_repeat("&nbsp;&nbsp;", $pass) .$category->category_name .'</option>' ;
        }
        if (count($category->children) > 0) {
            generateCategories($category->children, $pass+1);
        }
    }
}

function getParentCategory( $parent_id)
{
    $categories = Category::where('parent_id', $parent_id)->orderBy('id', 'desc')->with('parent')->get();
    foreach ($categories as $category) {
        foreach ($category->parent as $child){
            echo '<span class="child-' . $child->parent_id . '">' .$child->category_name .'</span>' ;
            if (count($child->parent) > 0) {
                getParentCategory($category->parent, $parent_id);
            }
        }
    }
}