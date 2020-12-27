<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeCategory;
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
        $categories = CreativeCategory::where('language_id', $language->id)->orderBy('id', 'desc')->get();

        return view('admin.creative.work.category.create', compact('categories'));
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
            'category_name' => 'required|unique:creative_categories|max:255',
            'status' => 'integer|in:0,1',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        CreativeCategory::firstOrCreate([
            'language_id' => getLanguage()->id,
            'category_name' => $input['category_name'],
            'status' => $input['status'],
            'order' => $input['order']
        ]);

        return redirect()->route('work-category.create')
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
        $category = CreativeCategory::find($id);

        return view('admin.creative.work.category.edit', compact('category'));
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
            'category_name' => [
                'required',
                'max:255',
                Rule::unique('creative_categories')->ignore($id),
            ],
            'status' => 'integer|in:0,1',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Update to database
        CreativeCategory::find($id)->update($input);

        return redirect()->route('work-category.create')
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
        $category = CreativeCategory::find($id);

        // Delete model
        $category->delete();

        return redirect()->route('work-category.create')
            ->with('success', 'content.deleted_successfully');
    }
}
