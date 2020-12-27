<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ServiceSection;
use Illuminate\Http\Request;

class ServiceSectionController extends Controller
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
        ServiceSection::firstOrCreate([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'desc' => $input['desc']
        ]);

        return redirect()->route('service.create')
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
        ServiceSection::find($id)->update($input);

        return redirect()->route('service.create')
            ->with('success', 'content.updated_successfully');
    }

}
