<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\App;
use App\Models\Admin\AppSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AppController extends Controller
{
    public function create()
    {
        // Retrieving a model
        $language = getLanguage();
        $apps = App::orderBy('id', 'desc')->get();
        $app_section = AppSection::where('language_id', $language->id)->first();

        return view('admin.app.create', compact('apps', 'app_section'));
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
            'app_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('app_image')){

            // Get image file
            $app_image = $request->file('app_image');

            // Folder path
            $folder = 'uploads/img/general/';

            // Make image name
            $app_image_name = time().'-'.$app_image->getClientOriginalName();

            // Upload image
            $app_image->move($folder, $app_image_name);

            // Set input
            $input['app_image'] = $app_image_name;

        }

        // Record to database
        App::create([
            'app_image' => $input['app_image'],
            'order' => $input['order'],
            'link' => $input['link']
        ]);

        return redirect()->route('app.create')
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
        $app = App::find($id);

        return view('admin.app.edit', compact('app'));
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
            'team_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'order' => 'required|integer',
        ]);

        // Get model
        $app = App::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('app_image')){

            // Get image file
            $app_image = $request->file('app_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $app_image_name =  time().'-'.$app_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$app->app_image));

            // Upload image
            $app_image->move($folder, $app_image_name);

            // Set input
            $input['app_image'] = $app_image_name;

        }

        // Record to database
        App::find($id)->update($input);

        return redirect()->route('app.create')
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
        $app = App::find($id);

        // Folder path
        $folder = 'uploads/img/general/';

        // Delete Image
        File::delete(public_path($folder.$app->app_image));

        // Delete record
        $app->delete();

        return redirect()->route('app.create')
            ->with('success', 'content.deleted_successfully');
    }
}
