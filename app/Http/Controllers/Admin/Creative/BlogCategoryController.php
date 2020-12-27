<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeBlogCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogCategoryController extends Controller
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
        $categories = CreativeBlogCategory::where('language_id', $language->id)->orderBy('id', 'desc')->get();

        return view('admin.creative.blog.category.create', compact('categories'));
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
            'category_name' => 'required|unique:creative_blog_categories|max:255',
            'status'   =>  'integer|in:0,1',
            'order'   =>  'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        CreativeBlogCategory::firstOrCreate([
            'language_id' => getLanguage()->id,
            'category_name' => $input['category_name'],
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
        $category = CreativeBlogCategory::find($id);

        return view('admin.creative.blog.category.edit', compact('category'));
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
        ]);

        // Get All Request
        $input = $request->all();

        // Update to database
        CreativeBlogCategory::find($id)->update($input);

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
        $category = CreativeBlogCategory::find($id);

        // Delete model
        $category->delete();

        return redirect()->route('blog-category.create')
            ->with('success', 'content.deleted_successfully');
    }
}
