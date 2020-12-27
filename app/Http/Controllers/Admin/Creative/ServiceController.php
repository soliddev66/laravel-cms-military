<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeService;
use App\Models\Admin\Creative\CreativeServiceSection;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models
        $language = getLanguage();
        $services = CreativeService::where('language_id', $language->id)->orderBy('id', 'desc')->get();
        $service_section = CreativeServiceSection::where('language_id', $language->id)->first();

        return view('admin.creative.service.index', compact( 'services', 'service_section'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.creative.service.create');

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
            'title'   =>  'required',
            'status'   =>  'integer|in:0,1',
            'order' => 'required|integer',
            'service_image'   =>  'mimes:svg,png,jpeg,jpg|max:2048'
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('service_image')){

            // Get image file
            $service_image_file = $request->file('service_image');

            // Folder path
            $folder = 'uploads/creative/img/services/';

            // Make image name
            $service_image_name = time().'-'.$service_image_file->getClientOriginalName();

            // Original size upload file
            $service_image_file->move($folder, $service_image_name);

            // Set input
            $input['service_image']= $service_image_name;

        } else {
            // Set input
            $input['service_image']= null;
        }

        // Record to database
        CreativeService::create([
            'language_id' => getLanguage()->id,
            'icon' => $input['icon'],
            'title' => $input['title'],
            'short_desc' => $input['short_desc'],
            'desc' => Purifier::clean($input['desc']),
            'status' => $input['status'],
            'service_image' => $input['service_image'],
            'order' => $input['order']
        ]);

        return redirect()->route('service.index')
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
        $service = CreativeService::find($id);

        return view('admin.creative.service.edit', compact('service'));
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
        $request->validate([
           'title'   =>  'required',
            'status'   =>  'integer|in:0,1',
            'order' => 'required|integer',
            'service_image'   =>  'mimes:svg,png,jpeg,jpg|max:2048'
        ]);

        $service = CreativeService::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('service_image')){

            // Get image file
            $service_image_file = $request->file('service_image');

            // Folder path
            $folder = 'uploads/creative/img/services/';

            // Make image name
            $service_image_name =  time().'-'.$service_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$service->service_image));

            // Original size upload file
            $service_image_file->move($folder, $service_image_name);

            // Set input
            $input['service_image']= $service_image_name;

        }

        // XSS Purifier
        $input['desc'] = Purifier::clean($input['desc']);

        // Update to database
        CreativeService::find($id)->update($input);

        return redirect()->route('service.index')
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
        $service = CreativeService::find($id);

        // Folder path
        $folder = 'uploads/creative/img/services/';

        // Delete Image
        File::delete(public_path($folder.$service->service_image));

        // Delete record
        $service->delete();

        return redirect()->route('service.index')
            ->with('success', 'content.deleted_successfully');
    }
}
