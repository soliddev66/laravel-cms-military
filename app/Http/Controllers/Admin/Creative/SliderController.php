<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving a model
        $sliders = CreativeSlider::all();

        return view('admin.creative.banner.sliders.create', compact('sliders'));
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
            'slider_image' => 'required|mimes:svg,png,jpeg,jpg|max:2048',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('slider_image')){

            // Get image file
            $slider_image = $request->file('slider_image');

            // Folder path
            $folder ='uploads/creative/img/sliders/';

            // Make image name
            $slider_image_name = time().'-'.$slider_image->getClientOriginalName();

            // Upload image
            $slider_image->move($folder, $slider_image_name);

            // Set input
            $input['slider_image']= $slider_image_name;

        }

        // Record to database
        CreativeSlider::firstOrCreate([
            'order' => $input['order'],
            'slider_image' => $input['slider_image']
        ]);

        return redirect()->route('slider.create')
            ->with('success', 'content.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieving a model
        $slider = CreativeSlider::find($id);

        return view('admin.creative.banner.sliders.edit', compact( 'slider'));
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
            'slider_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'order' => 'required|integer',
        ]);

        // Get model
        $slider = CreativeSlider::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('slider_image')){

            // Get image file
            $slider_image = $request->file('slider_image');

            // Folder path
            $folder ='uploads/creative/img/sliders/';

            // Make image name
            $slider_image_name =  time().'-'.$slider_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$slider->slider_image));

            // Upload image
            $slider_image->move($folder, $slider_image_name);

            // Set input
            $input['slider_image'] = $slider_image_name;

        }

        // Update user
        CreativeSlider::find($id)->update($input);

        return redirect()->route('slider.create')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve a model
        $slider = CreativeSlider::find($id);

        // Folder path
        $folder = 'uploads/creative/img/sliders/';

        // Delete Image
        File::delete(public_path($folder.$slider->slider_image));

        // Delete record
        $slider->delete();

        return redirect()->route('slider.create')
            ->with('success', 'content.deleted_successfully');
    }
}
