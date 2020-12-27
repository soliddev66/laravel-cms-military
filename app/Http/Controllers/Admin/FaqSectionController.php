<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\FaqSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FaqSectionController extends Controller
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

        if($request->hasFile('faq_image')){

            // Get image file
            $faq_image = $request->file('faq_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $faq_image_name =  time().'-'.$faq_image->getClientOriginalName();

            // Upload image
            $faq_image->move($folder, $faq_image_name);

            // Set input
            $input['faq_image']= $faq_image_name;

        } else {
            // Set input
            $input['faq_image']= null;
        }

        // Record to database
        FaqSection::firstOrCreate([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'desc' => $input['desc'],
            'faq_image' => $input['faq_image']
        ]);

        return redirect()->route('faq.create')
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
        $faq_section = FaqSection::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('faq_image')){

            // Get image file
            $faq_image = $request->file('faq_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $faq_image_name =  time().'-'.$faq_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$faq_section->faq_image));

            // Upload image
            $faq_image->move($folder, $faq_image_name);

            // Set input
            $input['faq_image'] = $faq_image_name;

        }


        // Update model
        FaqSection::find($id)->update($input);

        return redirect()->route('faq.create')
            ->with('success', 'content.updated_successfully');
    }

}
