<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\FeatureSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FeatureSectionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get All Request
        $input = $request->all();

        if ($request->hasFile('feature_image')) {

            // Get image file
            $feature_image = $request->file('feature_image');

            // Folder path
            $folder = 'uploads/img/general/';

            // Make image name
            $feature_image_name = time() . '-' . $feature_image->getClientOriginalName();

            // Upload image
            $feature_image->move($folder, $feature_image_name);

            // Set input
            $input['feature_image'] = $feature_image_name;

        } else {
            // Set input
            $input['feature_image'] = null;
        }

        // Record to database
        FeatureSection::firstOrCreate([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'desc' => $input['desc'],
            'feature_image' => $input['feature_image']
        ]);

        return redirect()->route('feature.create')
            ->with('success', 'content.created_successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Get model
        $feature_section = FeatureSection::find($id);

        // Get All Request
        $input = $request->all();

        if ($request->hasFile('feature_image')) {

            // Get image file
            $feature_image = $request->file('feature_image');

            // Folder path
            $folder = 'uploads/img/general/';

            // Make image name
            $feature_image_name = time() . '-' . $feature_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder . $feature_section->feature_image));

            // Upload image
            $feature_image->move($folder, $feature_image_name);

            // Set input
            $input['feature_image'] = $feature_image_name;

        }


        // Update model
        FeatureSection::find($id)->update($input);

        return redirect()->route('feature.create')
            ->with('success', 'content.updated_successfully');
    }

}
