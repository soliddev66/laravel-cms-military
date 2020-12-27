<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeVideo;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving a model
        $video = CreativeVideo::first();

        return view('admin.creative.banner.video.create', compact('video'));
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
            'video_link' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        CreativeVideo::firstOrCreate([
            'video_link' => $input['video_link']
        ]);

        return redirect()->route('video.create')
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
            'video_link' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Update model
        CreativeVideo::find($id)->update($input);

        return redirect()->route('video.create')
            ->with('success', 'content.updated_successfully');
    }

}
