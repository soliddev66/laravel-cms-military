<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeSocial;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $socials = CreativeSocial::all();

        return view('admin.creative.contact.social.create', compact('socials'));
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
            'social_media' => 'required|max:255',
            'link' => 'max:255',
            'status' => 'integer|in:0,1',
        ]);

        // Get All Request
        $input = $request->all();


        // Record to database
        CreativeSocial::firstOrCreate([
            'social_media' => $input['social_media'],
            'link' => $input['link'],
            'status' => $input['status']
        ]);

        return redirect()->route('social.create')
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
        // Retrieve a model
        $social = CreativeSocial::find($id);

        return view('admin.creative.contact.social.edit', compact('social'));
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
            'social_media' => 'required|max:255',
            'link' => 'max:255',
            'status' => 'integer|in:0,1',
        ]);

        // Get All Request
        $input = $request->all();

        // Update to database
        CreativeSocial::find($id)->update($input);

        return redirect()->route('social.create')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_status($id)
    {
        //Find a model
        $social = CreativeSocial::find($id);

        if ($social->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        // Update to database
        CreativeSocial::find($id)->update(['status' => $status]);

        return redirect()->route('social.create')
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
        $social = CreativeSocial::find($id);

        // Delete record
        $social->delete();

        return redirect()->route('social.create')
            ->with('success', 'content.deleted_successfully');
    }
}

