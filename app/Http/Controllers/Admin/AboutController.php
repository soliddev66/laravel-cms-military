<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Admin\InfoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
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
        $about = About::where('language_id', $language->id)->first();
        $info_lists = InfoList::where('language_id', $language->id)->get();

        return view('admin.about.create', compact('about', 'info_lists'));
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
            'title' => 'required',
            'desc' => 'required',
            'about_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('about_image')){

            // Get image file
            $about_image = $request->file('about_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $about_image_name =  time().'-'.$about_image->getClientOriginalName();

            // Upload image
            $about_image->move($folder, $about_image_name);

            // Set input
            $input['about_image']= $about_image_name;

        } else {
            // Set input
            $input['about_image']= null;
        }

        // Record to database
        About::firstOrCreate([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'desc' => $input['desc'],
            'btn_name' => $input['btn_name'],
            'btn_link' => $input['btn_link'],
            'about_image' => $input['about_image']
        ]);

        return redirect()->route('about.create')
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
            'title' => 'required',
            'desc' => 'required',
            'about_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get model
        $about = About::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('about_image')){

            // Get image file
            $about_image = $request->file('about_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $about_image_name =  time().'-'.$about_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$about->about_image));

            // Upload image
            $about_image->move($folder, $about_image_name);

            // Set input
            $input['about_image'] = $about_image_name;

        }

        // Update model
        About::find($id)->update($input);

        return redirect()->route('about.create')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_info_list(Request $request)
    {
        // Form validation
        $request->validate([
            'desc' => 'required',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();


        // Record to database
        InfoList::create([
                'language_id' => getLanguage()->id,
                'desc' => $input['desc'],
                'order' => $input['order']
            ]);

        return redirect()->route('about.create')
            ->with('success', 'content.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_info_list($id)
    {
        // Retrieving models
        $info_list = InfoList::find($id);

        return view('admin.about.edit', compact('info_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_info_list(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'desc' => 'required',
            'order' => 'integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        InfoList::find($id)->update($input);

        return redirect()->route('about.create')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_info_list($id)
    {
        // Retrieve a model
        $info_list = InfoList::find($id);

        // Delete record
        $info_list->delete();

        return redirect()->route('about.create')
            ->with('success', 'content.deleted_successfully');
    }
}
