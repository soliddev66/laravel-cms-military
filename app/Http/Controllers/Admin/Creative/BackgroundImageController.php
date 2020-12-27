<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeBackgroundImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BackgroundImageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving a model
        $background = CreativeBackgroundImage::first();

        return view('admin.creative.banner.background_image.create', compact('background'));
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
            'background_image' => 'required|mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('background_image')){

            // Get image file
            $background_image = $request->file('background_image');

            // Folder path
            $folder ='uploads/creative/img/general/';

            // Make image name
            $background_image_name =  time().'-'.$background_image->getClientOriginalName();

            // Upload image
            $background_image->move($folder, $background_image_name);

            // Set input
            $input['background_image']= $background_image_name;

        }

        // Record to database
        CreativeBackgroundImage::firstOrCreate([
            'background_image' => $input['background_image']
        ]);

        return redirect()->route('background-image.create')
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
            'background_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get model
        $background = CreativeBackgroundImage::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('background_image')){

            // Get image file
            $background_image = $request->file('background_image');

            // Folder path
            $folder ='uploads/creative/img/general/';

            // Make image name
            $background_image_name =  time().'-'.$background_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$background->background_image));

            // Upload image
            $background_image->move($folder, $background_image_name);

            // Set input
            $input['background_image'] = $background_image_name;

        }

        // Update user
        CreativeBackgroundImage::find($id)->update($input);

        return redirect()->route('background-image.create')
            ->with('success', 'content.updated_successfully');
    }

}
