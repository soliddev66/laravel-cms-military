<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeContactSection;
use Illuminate\Http\Request;

class ContactSectionController extends Controller
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
        CreativeContactSection::firstOrCreate([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'map_iframe' => $input['map_iframe']
        ]);

        return redirect()->route('contact.create')
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
        CreativeContactSection::find($id)->update($input);

        return redirect()->route('contact.create')
            ->with('success', 'content.updated_successfully');
    }

}

