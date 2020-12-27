<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeWorkSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WorkSliderController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // Retrieving a model
        $slider_items = CreativeWorkSlider::orderBy('id', 'desc')->get();

        return view('admin.creative.work.work.work_slider.create', compact('slider_items', 'id'));
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
            'creative_work_id' => 'required|integer',
            'slider_image' => 'required|mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('slider_image')){

            // Get image file
            $slider_image = $request->file('slider_image');

            // Folder path
            $folder ='uploads/creative/img/works/sliders/';

            // Make image name
            $slider_image_name =  time().'-'.$slider_image->getClientOriginalName();

            // Upload image
            $slider_image->move($folder, $slider_image_name);

            // Set input
            $input['slider_image']= $slider_image_name;

        }

        // Record to database
        CreativeWorkSlider::create([
            'creative_work_id' => $input['creative_work_id'],
            'slider_image' => $input['slider_image']
        ]);

        return redirect()->route('work-slider.create', $input['creative_work_id'])
            ->with('success', 'content.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($creative_work_id, $id)
    {
        // Retrieving models
        $slider_item = CreativeWorkSlider::find($id);

        return view('admin.creative.work.work.work_slider.edit', compact('slider_item', 'creative_work_id'));
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
            'about_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get model
        $slider = CreativeWorkSlider::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('slider_image')){

            // Get image file
            $slider_image = $request->file('slider_image');

            // Folder path
            $folder ='uploads/creative/img/works/sliders/';

            // Make image name
            $slider_image_name = time().'-'.$slider_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$slider->slider_image));

            // Upload image
            $slider_image->move($folder, $slider_image_name);

            // Set input
            $input['slider_image'] = $slider_image_name;

        }

        // Record to database
        CreativeWorkSlider::find($id)->update($input);

        return redirect()->route('work-slider.create', $input['creative_work_id'])
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
        $slider = CreativeWorkSlider::find($id);

        // Folder path
        $folder = 'uploads/creative/img/works/sliders/';

        // Delete Image
        File::delete(public_path($folder.$slider->slider_image));

        // Delete record
        $slider->delete();

        return redirect()->route('work-slider.create', $slider->creative_work_id)
            ->with('success', 'content.deleted_successfully');
    }
}
