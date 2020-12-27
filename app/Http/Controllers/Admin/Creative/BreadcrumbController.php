<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeBreadcrumb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BreadcrumbController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving a model
        $breadcrumb = CreativeBreadcrumb::first();

        return view('admin.creative.setting.breadcrumb.create', compact('breadcrumb'));
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
            'breadcrumb_image' => 'required|mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('breadcrumb_image')){

            // Get image file
            $breadcrumb_image = $request->file('breadcrumb_image');

            // Folder path
            $folder ='uploads/creative/img/general/';

            // Make image name
            $breadcrumb_image_name =  time().'-'.$breadcrumb_image->getClientOriginalName();

            // Upload image
            $breadcrumb_image->move($folder, $breadcrumb_image_name);

            // Set input
            $input['breadcrumb_image']= $breadcrumb_image_name;

        }

        // Record to database
        CreativeBreadcrumb::firstOrCreate([
            'breadcrumb_image' => $input['breadcrumb_image']
        ]);

        return redirect()->route('breadcrumb.create')
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
            'about_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get model
        $breadcrumb = CreativeBreadcrumb::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('breadcrumb_image')){

            // Get image file
            $breadcrumb_image = $request->file('breadcrumb_image');

            // Folder path
            $folder ='uploads/creative/img/general/';

            // Make image name
            $breadcrumb_image_name =  time().'-'.$breadcrumb_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$breadcrumb->breadcrumb_image));

            // Upload image
            $breadcrumb_image->move($folder, $breadcrumb_image_name);

            // Set input
            $input['breadcrumb_image'] = $breadcrumb_image_name;

        }

        // Update model
        CreativeBreadcrumb::find($id)->update($input);

        return redirect()->route('breadcrumb.create')
            ->with('success', 'content.updated_successfully');
    }
}
