<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\HowToInstallSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HowToInstallSectionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        if($request->hasFile('install_image')){

            // Get image file
            $install_image = $request->file('install_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $install_image_name =  time().'-'.$install_image->getClientOriginalName();

            // Upload image
            $install_image->move($folder, $install_image_name);

            // Set input
            $input['install_image']= $install_image_name;

        } else {
            // Set input
            $input['install_image']= null;
        }

        // Record to database
        HowToInstallSection::firstOrCreate([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'desc' => $input['desc'],
            'install_image' => $input['install_image'],
            'video_link' => $input['video_link']
        ]);

        return redirect()->route('how-to-install.create')
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
        $install_section = HowToInstallSection::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('install_image')){

            // Get image file
            $install_image = $request->file('install_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $install_image_name =  time().'-'.$install_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$install_section->install_image));

            // Upload image
            $install_image->move($folder, $install_image_name);

            // Set input
            $input['install_image'] = $install_image_name;

        }


        // Update model
        HowToInstallSection::find($id)->update($input);

        return redirect()->route('how-to-install.create')
            ->with('success', 'content.updated_successfully');
    }

}
