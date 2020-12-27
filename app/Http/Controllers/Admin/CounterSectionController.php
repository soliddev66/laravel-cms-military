<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CounterSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CounterSectionController extends Controller
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

        if($request->hasFile('counter_image')){

            // Get image file
            $counter_image = $request->file('counter_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $counter_image_name =  time().'-'.$counter_image->getClientOriginalName();

            // Upload image
            $counter_image->move($folder, $counter_image_name);

            // Set input
            $input['counter_image']= $counter_image_name;

        } else {
            // Set input
            $input['counter_image']= null;
        }

        // Record to database
        CounterSection::firstOrCreate([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'desc' => $input['desc'],
            'counter_image' => $input['counter_image']
        ]);

        return redirect()->route('counter.create')
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
        $counter_section = CounterSection::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('counter_image')){

            // Get image file
            $counter_image = $request->file('counter_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $counter_image_name =  time().'-'.$counter_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$counter_section->counter_image));

            // Upload image
            $counter_image->move($folder, $counter_image_name);

            // Set input
            $input['counter_image'] = $counter_image_name;

        }


        // Update model
        CounterSection::find($id)->update($input);

        return redirect()->route('counter.create')
            ->with('success', 'content.updated_successfully');
    }

}
