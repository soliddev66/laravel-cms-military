<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $language = getLanguage();
        $categories = Category::where('language_id', $language->id)->orderBy('id', 'desc')->with('parent')->get();
        $parentCategories = Category::where('parent_id', '=', 0)->orderBy('id', 'desc')->with('children')->get();

        return view('admin.blog.category.create', compact('categories', 'parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Form validation
        $request->validate([
            'category_name'   =>  'required|max:255',
            'parent_id'   =>  'required|integer',
            'desc'   =>  'required',
            'status'   =>  'integer|in:0,1',
            'order'   =>  'required|integer',
            'category_image'   =>  'mimes:svg,png,jpeg,jpg|max:2048',
        ]);
            
        // Get All Request
        $input = $request->all();

        if($request->hasFile('category_image')){

            // Get image file
            $category_image_file = $request->file('category_image');

            // Folder path
            $folder = 'uploads/img/category/';

            // Make image name
            $category_image_name = time().'-'.$category_image_file->getClientOriginalName();

            // Original size upload file
            $category_image_file->move($folder, $category_image_name);

            // Set input
            $input['category_image']= $category_image_name;

        } else {
            // Set input
            $input['category_image']= null;
        }
        // Record to database
        Category::firstOrCreate([
            'language_id' => getLanguage()->id,
            'category_name' => $input['category_name'],
            'parent_id' => $input['parent_id'],
            'category_image' => $input['category_image'],
            'short_desc' => $input['short_desc'],
            'desc' => $input['desc'],
            'status' => $input['status'],
            'order' => $input['order']
        ]);

        return redirect()->route('blog-category.create')
            ->with('success', 'content.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieving models
        $category = Category::find($id);
        $parentCategoryName = Category::where('id', $category->parent_id)->value('category_name');
        $parentCategories = Category::where('parent_id', '=', 0)->orderBy('id', 'desc')->with('children')->get();

        return view('admin.blog.category.edit', compact('category', 'parentCategories', 'parentCategoryName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // Form validation
        $request->validate([
            'category_name'   =>  [
                'required',
                'max:255',
                Rule::unique('categories')->ignore($id),
            ],
            'status'   =>  'integer|in:0,1',
            'order'   =>  'required|integer',
            'category_image'   =>  'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('category_image')){

            // Get image file
            $category_image_file = $request->file('category_image');

            // Folder path
            $folder = 'uploads/img/category/';

            // Make image name
            $category_image_name = time().'-'.$category_image_file->getClientOriginalName();

            // Original size upload file
            $category_image_file->move($folder, $category_image_name);

            // Set input
            $input['category_image']= $category_image_name;

        }

        // Update to database
        Category::find($id)->update($input);

        return redirect()->route('blog-category.create')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrivieng a model
        $category = Category::find($id);
        
        Category::where('parent_id', $id)
            ->update(['parent_id' => NULL]);

        // Delete model
        $category->delete();

        return redirect()->route('blog-category.create')
            ->with('success', 'content.deleted_successfully');
    }
}
