<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeCallToAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CallToActionController extends Controller
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
        $call_to_action = CreativeCallToAction::where('language_id', $language->id)->first();

        return view('admin.creative.call_to_action.create', compact('call_to_action'));
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
            'action_image' => 'required|mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('action_image')){

            // Get image file
            $action_image = $request->file('action_image');

            // Folder path
            $folder ='uploads/creative/img/general/';

            // Make image name
            $action_image_name =  time().'-'.$action_image->getClientOriginalName();

            // Upload image
            $action_image->move($folder, $action_image_name);

            // Set input
            $input['action_image']= $action_image_name;

        }

        // Record to database
        CreativeCallToAction::firstOrCreate([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'desc' => $input['desc'],
            'action_image' => $input['action_image']
        ]);

        return redirect()->route('call-to-action.create')
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
            'action_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get model
        $call_to_action = CreativeCallToAction::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('action_image')){

            // Get image file
            $action_image = $request->file('action_image');

            // Folder path
            $folder ='uploads/creative/img/general/';

            // Make image name
            $action_image_name = time().'-'.$action_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$call_to_action->action_image));

            // Upload image
            $action_image->move($folder, $action_image_name);

            // Set input
            $input['action_image'] = $action_image_name;

        }

        // Update model
        CreativeCallToAction::find($id)->update($input);

        return redirect()->route('call-to-action.create')
            ->with('success', 'content.updated_successfully');
    }

}
