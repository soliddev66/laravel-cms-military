<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TeamSection;
use Illuminate\Http\Request;

class TeamSectionController extends Controller
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
        TeamSection::firstOrCreate([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'desc' => $input['desc']
        ]);

        return redirect()->route('team.create')
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
        TeamSection::find($id)->update($input);

        return redirect()->route('team.create')
            ->with('success', 'content.updated_successfully');
    }

}
