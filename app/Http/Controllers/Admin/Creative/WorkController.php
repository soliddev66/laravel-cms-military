<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeCategory;
use App\Models\Admin\Creative\CreativeWork;
use App\Models\Admin\Creative\CreativeWorkSection;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WorkController extends Controller
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
        $works = CreativeWork::where('language_id', $language->id)->orderBy('id', 'desc')->get();
        $categories = CreativeCategory::where('language_id', $language->id)->get();
        $work_section = CreativeWorkSection::where('language_id', $language->id)->first();

        if (count($categories) > 0) {

            return view('admin.creative.work.work.index', compact( 'works', 'categories', 'work_section'));

        } else{

            return redirect()->route('work-category.create')
                ->with('success', 'content.please_create_a_category');

        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $language = getLanguage();
        $categories = CreativeCategory::where('language_id', $language->id)->get();

        return view('admin.creative.work.work.create', compact(  'categories'));

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
            'creative_category_id' => 'integer|required',
            'title' => 'required',
            'status' => 'integer|in:0,1',
            'thumbnail_image'   =>  'mimes:svg,png,jpeg,jpg|max:2048'
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('thumbnail_image')){

            // Get image file
            $thumbnail_image_file = $request->file('thumbnail_image');

            // Folder path
            $folder = 'uploads/creative/img/works/';

            // Make image name
            $thumbnail_image_name = time().'-'.$thumbnail_image_file->getClientOriginalName();

            // Original size upload file
            $thumbnail_image_file->move($folder, $thumbnail_image_name);

            // Set input
            $input['thumbnail_image']= $thumbnail_image_name;

        } else {
            // Set input
            $input['thumbnail_image']= null;
        }

        // Find category
        $category = CreativeCategory::find($input['creative_category_id']);

        // Record to database
        CreativeWork::create([
            'language_id' => getLanguage()->id,
            'category_name' => $category->category_name,
            'creative_category_id' => $input['creative_category_id'],
            'title' => $input['title'],
            'desc' => Purifier::clean($input['desc']),
            'thumbnail_image' => $input['thumbnail_image'],
            'status' => $input['status']
        ]);

        return redirect()->route('work.index')
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
        $language = getLanguage();
        $work = CreativeWork::find($id);
        $categories = CreativeCategory::where('language_id', $language->id)->get();

        return view('admin.creative.work.work.edit', compact('work', 'categories'));
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
            'creative_category_id' => 'integer|required',
            'title' => 'required',
            'status' => 'integer|in:0,1',
            'blog_image' => 'mimes:svg,png,jpeg,jpg|max:2048'
        ]);

        $work = CreativeWork::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('thumbnail_image')){

            // Get image file
            $thumbnail_image_file = $request->file('thumbnail_image');

            // Folder path
            $folder = 'uploads/creative/img/works/';

            // Make image name
            $thumbnail_image_name =  time().'-'.$thumbnail_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$work->thumbnail_image));

            // Original size upload file
            $thumbnail_image_file->move($folder, $thumbnail_image_name);

            // Set input
            $input['thumbnail_image']= $thumbnail_image_name;

        }

        // Find category
        $category = CreativeCategory::find($input['creative_category_id']);
        $input['category_name'] = $category->category_name;

        // XSS Purifier
        $input['desc'] = Purifier::clean($input['desc']);

        // Update to database
        CreativeWork::find($id)->update($input);

        return redirect()->route('work.index')
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
        $work = CreativeWork::find($id);

        // Folder path
        $folder = 'uploads/creative/img/works/';

        // Delete Image
        File::delete(public_path($folder.$work->thumbnail_image));

        // Delete record
        $work->delete();

        return redirect()->route('work.index')
            ->with('success', 'content.deleted_successfully');
    }
}
