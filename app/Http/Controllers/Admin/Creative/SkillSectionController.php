<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeSkillSection;
use Illuminate\Http\Request;

class SkillSectionController extends Controller
{
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
        CreativeSkillSection::firstOrCreate([
            'language_id' => getLanguage()->id,
            'title' => $input['title']
        ]);

        return redirect()->route('skill.create')
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
        // Get All Request
        $input = $request->all();

        // Update model
        CreativeSkillSection::find($id)->update($input);

        return redirect()->route('skill.create')
            ->with('success', 'content.updated_successfully');
    }

}
