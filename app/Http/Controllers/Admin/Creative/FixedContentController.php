<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeFixedContent;
use Illuminate\Http\Request;

class FixedContentController extends Controller
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
        $fixed_content = CreativeFixedContent::where('language_id', $language->id)->first();

        return view('admin.creative.banner.fixed_content.create', compact('fixed_content'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get All Request
        $input = $request->all();

        // Record to database
        CreativeFixedContent::firstOrCreate([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'animated_desc' => $input['animated_desc'],
        ]);

        return redirect()->route('fixed-content.create')
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
        // Get model
        $fixed_content = CreativeFixedContent::find($id);

        // Get All Request
        $input = $request->all();

        // Update user
        CreativeFixedContent::find($id)->update($input);

        return redirect()->route('fixed-content.create')
            ->with('success', 'content.updated_successfully');
    }

}
