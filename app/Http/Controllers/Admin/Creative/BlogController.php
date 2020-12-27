<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeBlog;
use App\Models\Admin\Creative\CreativeBlogCategory;
use App\Models\Admin\Creative\CreativeBlogSection;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
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
        $blogs = CreativeBlog::where('language_id', $language->id)->orderBy('id', 'desc')->get();
        $categories = CreativeBlogCategory::where('language_id', $language->id)->get();
        $blog_section = CreativeBlogSection::where('language_id', $language->id)->first();

        if (count($categories) > 0) {

            return view('admin.creative.blog.post.index', compact( 'blogs', 'categories', 'blog_section'));

        } else{

            return redirect()->route('blog-category.create')
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
        $categories = CreativeBlogCategory::where('language_id', $language->id)->get();

        return view('admin.creative.blog.post.create', compact(  'categories'));

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
            'category_id'   =>  'integer|required',
            'title'   =>  'required',
            'desc'   =>  'required',
            'status'   =>  'integer|in:0,1',
            'blog_image'   =>  'mimes:svg,png,jpeg,jpg|max:2048'
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('blog_image')){

            // Get image file
            $blog_image_file = $request->file('blog_image');

            // Folder path
            $folder = 'uploads/creative/img/blogs/';

            // Make image name
            $blog_image_name = time().'-'.$blog_image_file->getClientOriginalName();

            // Original size upload file
            $blog_image_file->move($folder, $blog_image_name);

            // Set input
            $input['blog_image']= $blog_image_name;

        } else {
            // Set input
            $input['blog_image']= null;
        }

        // Find category
        $category = CreativeBlogCategory::find($input['category_id']);

        // Record to database
        CreativeBlog::create([
            'language_id' => getLanguage()->id,
            'category_name' => $category->category_name,
            'category_id' => $input['category_id'],
            'title' => $input['title'],
            'short_desc' => $input['short_desc'],
            'desc' => Purifier::clean($input['desc']),
            'blog_image' => $input['blog_image'],
            'author' => $input['author'],
            'status' => $input['status']
        ]);

        return redirect()->route('blog.index')
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
        $blog = CreativeBlog::find($id);
        $categories = CreativeBlogCategory::where('language_id', $language->id)->get();

        return view('admin.creative.blog.post.edit', compact('blog', 'categories'));
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
            'category_id'   =>  'integer|required',
            'title'   =>  'required',
            'desc'   =>  'required',
            'status'   =>  'integer|in:0,1',
            'blog_image'   =>  'mimes:svg,png,jpeg,jpg|max:2048'
        ]);

        $blog = CreativeBlog::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('blog_image')){

            // Get image file
            $blog_image_file = $request->file('blog_image');

            // Folder path
            $folder = 'uploads/creative/img/blogs/';

            // Make image name
            $blog_image_name =  time().'-'.$blog_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$blog->blog_image));

            // Original size upload file
            $blog_image_file->move($folder, $blog_image_name);

            // Set input
            $input['blog_image']= $blog_image_name;

        }

        // Find category
        $category = CreativeBlogCategory::find($input['category_id']);
        $input['category_name'] = $category->category_name;

        // XSS Purifier
        $input['desc'] = Purifier::clean($input['desc']);

        // Update to database
        CreativeBlog::find($id)->update($input);

        return redirect()->route('blog.index')
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
        $blog = CreativeBlog::find($id);

        // Folder path
        $folder = 'uploads/creative/img/blogs/';

        // Delete Image
        File::delete(public_path($folder.$blog->blog_image));

        // Delete record
        $blog->delete();

        return redirect()->route('blog.index')
            ->with('success', 'content.deleted_successfully');
    }
}
