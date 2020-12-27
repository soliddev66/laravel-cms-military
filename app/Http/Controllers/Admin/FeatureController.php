<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Feature;
use App\Models\Admin\FeatureSection;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving a model
        $language = getLanguage();
        $features = Feature::where('language_id', $language->id)->get();
        $feature_section = FeatureSection::where('language_id', $language->id)->orderBy('id', 'desc')->first();

        return view('admin.feature.create', compact('features', 'feature_section'));
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
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        Feature::create([
            'language_id' => getLanguage()->id,
            'icon' => $input['icon'],
            'title' => $input['title'],
            'desc' => $input['desc'],
            'order' => $input['order']
        ]);

        return redirect()->route('feature.create')
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
        $feature = Feature::find($id);

        return view('admin.feature.edit', compact('feature'));
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
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        Feature::find($id)->update($input);

        return redirect()->route('feature.create')
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
        // Retrieve a model
        $feature = Feature::find($id);

        // Delete record
        $feature->delete();

        return redirect()->route('feature.create')
            ->with('success', 'content.deleted_successfully');
    }
}
