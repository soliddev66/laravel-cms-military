<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeAbout;
use App\Models\Admin\Creative\CreativeInfoList;
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
        $about = CreativeAbout::where('language_id', $language->id)->first();
        $info_lists = CreativeInfoList::where('language_id', $language->id)->get();

        return view('admin.creative.about.create', compact('about', 'info_lists'));
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
            'about_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('about_image')){

            // Get image file
            $about_image = $request->file('about_image');

            // Folder path
            $folder ='uploads/creative/img/general/';

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
        CreativeAbout::firstOrCreate([
            'language_id' => getLanguage()->id,
            'top_title' => $input['top_title'],
            'title' => $input['title'],
            'desc' => $input['desc'],
            'video_link' => $input['video_link'],
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
            'about_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get model
        $about = CreativeAbout::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('about_image')){

            // Get image file
            $about_image = $request->file('about_image');

            // Folder path
            $folder ='uploads/creative/img/general/';

            // Make image name
            $about_image_name = time().'-'.$about_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$about->about_image));

            // Upload image
            $about_image->move($folder, $about_image_name);

            // Set input
            $input['about_image'] = $about_image_name;

        }

        // Update model
        CreativeAbout::find($id)->update($input);

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
            'title' => 'required',
            'desc' => 'required',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();


        // Record to database
        CreativeInfoList::create([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
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
        $info_list = CreativeInfoList::find($id);

        return view('admin.creative.about.edit', compact('info_list'));
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
            'title' => 'required',
            'desc' => 'required',
            'order' => 'integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        CreativeInfoList::find($id)->update($input);

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
        $info_list = CreativeInfoList::find($id);

        // Delete record
        $info_list->delete();

        return redirect()->route('about.create')
            ->with('success', 'content.deleted_successfully');
    }
}
