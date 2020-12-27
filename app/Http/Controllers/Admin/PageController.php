<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Page;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class PageController extends Controller
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
        $pages = Page::where('language_id', $language->id)->orderBy('id', 'desc')->get();

        return view('admin.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
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
            'page_title' => 'required|unique:pages',
            'desc' => 'required',
            'breadcrumb_image' => 'mimes:svg,jpeg,jpg,png|max:2048',
            'status' => 'integer|in:0,1',
            'display_footer_menu' => 'integer|in:0,1',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('breadcrumb_image')){

            // Get image file
            $breadcrumb_image_file = $request->file('breadcrumb_image');

            // Folder path
            $folder ='uploads/img/general/';

            // Make image name
            $breadcrumb_image_name = time().'-'.$breadcrumb_image_file->getClientOriginalName();

            // Upload image
            $breadcrumb_image_file->move($folder, $breadcrumb_image_name);

            // Set input
            $input['breadcrumb_image']= $breadcrumb_image_name;

        } else {
            // Set input
            $input['breadcrumb_image']= null;
        }

        // Record to database
        Page::create(
            [
                'language_id' => getLanguage()->id,
                'page_title' => $input['page_title'],
                'desc' => Purifier::clean($input['desc']),
                'breadcrumb_image' => $input['breadcrumb_image'],
                'status' => $input['status'],
                'display_footer_menu' => $input['display_footer_menu'],
                'order' => $input['order']
            ]
        );

        return redirect()->route('page.index')
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
        $page = Page::find($id);

        return view('admin.page.edit', compact( 'page'));
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
            'page_title'   =>  [
                'required',
                Rule::unique('pages')->ignore($id),
            ],
            'desc' => 'required',
            'breadcrumb_image' => 'mimes:svg,jpeg,jpg,png|max:2048',
            'status' => 'integer|in:0,1',
            'display_footer_menu' => 'integer|in:0,1',
            'order' => 'required|integer',
        ]);

        $page = Page::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('breadcrumb_image')){

            // Get image file
            $breadcrumb_image_file = $request->file('breadcrumb_image');

            // Folder path
            $folder = 'uploads/img/general/';

            // Make image name
            $breadcrumb_image_name = time().'.'.$breadcrumb_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$page->breadcrumb_image));

            // Original size upload file
            $breadcrumb_image_file->move($folder, $breadcrumb_image_name);

            // Set input
            $input['breadcrumb_image']= $breadcrumb_image_name;

        }

        // XSSCleaner Cleaner
        $input['desc'] = Purifier::clean($input['desc']);

        // Update to database
        Page::find($id)->update($input);

        return redirect()->route('page.index')
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
        $page = Page::find($id);

        // Folder path
        $folder = 'uploads/img/general/';

        // Delete Image
        File::delete(public_path($folder.$page->breadcrumb_image));

        // Delete record
        $page->delete();

        return redirect()->route('page.index')
            ->with('success','content.deleted_successfully');
    }
}
