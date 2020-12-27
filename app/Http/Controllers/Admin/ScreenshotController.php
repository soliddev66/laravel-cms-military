<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Screenshot;
use App\Models\Admin\ScreenshotSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ScreenshotController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving a model
        $language = getLanguage();
        $screenshots = Screenshot::where('language_id', $language->id)->orderBy('id', 'desc')->get();
        $screenshot_section = ScreenshotSection::where('language_id', $language->id)->first();

        return view('admin.screenshot.create', compact('screenshots', 'screenshot_section'));
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
            'screenshot_image' => 'required|mimes:svg,png,jpeg,jpg|max:2048',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('screenshot_image')){

            // Get image file
            $screenshot_image = $request->file('screenshot_image');

            // Folder path
            $folder ='uploads/img/screenshots/';

            // Make image name
            $screenshot_image_name =  time().'-'.$screenshot_image->getClientOriginalName();

            // Upload image
            $screenshot_image->move($folder, $screenshot_image_name);

            // Set input
            $input['screenshot_image']= $screenshot_image_name;

        }

        // Record to database
        Screenshot::create([
            'language_id' => getLanguage()->id,
            'screenshot_image' => $input['screenshot_image'],
            'order' => $input['order']
        ]);

        return redirect()->route('screenshot.create')
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
        // Retrieving models
        $screenshot = Screenshot::find($id);

        return view('admin.screenshot.edit', compact('screenshot'));
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
            'screenshot_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'order' => 'required|integer',
        ]);

        // Get model
        $screenshot = Screenshot::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('screenshot_image')){

            // Get image file
            $screenshot_image = $request->file('screenshot_image');

            // Folder path
            $folder ='uploads/img/screenshots/';

            // Make image name
            $screenshot_image_name =  time().'-'.$screenshot_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$screenshot->screenshot_image));

            // Upload image
            $screenshot_image->move($folder, $screenshot_image_name);

            // Set input
            $input['screenshot_image'] = $screenshot_image_name;

        }

        // Record to database
        Screenshot::find($id)->update($input);

        return redirect()->route('screenshot.create')
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
        $screenshot = Screenshot::find($id);

        // Folder path
        $folder = 'uploads/img/screenshots/';

        // Delete Image
        File::delete(public_path($folder.$screenshot->screenshot_image));

        // Delete record
        $screenshot->delete();

        return redirect()->route('screenshot.create')
            ->with('success', 'content.deleted_successfully');
    }
}
