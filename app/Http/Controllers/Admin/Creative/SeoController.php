<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeSeo;
use Illuminate\Http\Request;

class SeoController extends Controller
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
        $seo = CreativeSeo::where('language_id', $language->id)->first();

        return view('admin.creative.setting.seo.create', compact('seo'));
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
            'site_name' => 'required',
            'site_desc' => 'required',
            'site_keywords' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        CreativeSeo::firstOrCreate([
            'language_id' => getLanguage()->id,
            'site_name' => $input['site_name'],
            'site_desc' => $input['site_desc'],
            'site_keywords' => $input['site_keywords'],
            'fb_app_id' => $input['fb_app_id']
        ]);

        return redirect()->route('seo.create')
            ->with('success', 'content.created_successfully');
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
            'site_name' => 'required',
            'site_desc' => 'required',
            'site_keywords' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Update model
        CreativeSeo::find($id)->update($input);

        return redirect()->route('seo.create')
            ->with('success', 'content.updated_successfully');
    }

}
