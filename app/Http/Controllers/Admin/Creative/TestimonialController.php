<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeTestimonial;
use App\Models\Admin\Creative\CreativeTestimonialSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
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
        $testimonials = CreativeTestimonial::where('language_id', $language->id)->orderBy('id', 'asc')->get();
        $testimonial_section = CreativeTestimonialSection::where('language_id', $language->id)->first();

        return view('admin.creative.testimonial.create', compact('testimonials', 'testimonial_section'));
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
            'testimonial_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'star' => 'required|integer|in:1,2,3,4,5',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('testimonial_image')){

            // Get image file
            $testimonial_image = $request->file('testimonial_image');

            // Folder path
            $folder = 'uploads/creative/img/testimonials/';

            // Make image name
            $testimonial_image_name = time().'-'.$testimonial_image->getClientOriginalName();

            // Upload image
            $testimonial_image->move($folder, $testimonial_image_name);

            // Set input
            $input['testimonial_image'] = $testimonial_image_name;

        } else {
            // Set input
            $input['testimonial_image'] = null;
        }

        // Record to database
        CreativeTestimonial::create([
            'language_id' => getLanguage()->id,
            'testimonial_image' => $input['testimonial_image'],
            'name' => $input['name'],
            'job' => $input['job'],
            'desc' => $input['desc'],
            'star' => $input['star'],
            'order' => $input['order']
        ]);

        return redirect()->route('testimonial.create')
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
        $testimonial = CreativeTestimonial::find($id);

        return view('admin.creative.testimonial.edit', compact('testimonial'));
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
            'testimonial_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'star' => 'integer|in:1,2,3,4,5',
            'order' => 'required|integer',
        ]);

        // Get model
        $testimonial = CreativeTestimonial::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('testimonial_image')){

            // Get image file
            $testimonial_image = $request->file('testimonial_image');

            // Folder path
            $folder ='uploads/creative/img/testimonials/';

            // Make image name
            $testimonial_image_name =  time().'-'.$testimonial_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$testimonial->testimonial_image));

            // Upload image
            $testimonial_image->move($folder, $testimonial_image_name);

            // Set input
            $input['testimonial_image'] = $testimonial_image_name;

        }

        // Record to database
        CreativeTestimonial::find($id)->update($input);

        return redirect()->route('testimonial.create')
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
        $testimonial = CreativeTestimonial::find($id);

        // Folder path
        $folder = 'uploads/creative/img/testimonials/';

        // Delete Image
        File::delete(public_path($folder.$testimonial->testimonial_image));

        // Delete record
        $testimonial->delete();

        return redirect()->route('testimonial.create')
            ->with('success', 'content.deleted_successfully');
    }
}
