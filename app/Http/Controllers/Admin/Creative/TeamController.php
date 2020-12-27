<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeTeam;
use App\Models\Admin\Creative\CreativeTeamSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function create()
    {
        // Retrieving a model
        $language = getLanguage();
        $teams = CreativeTeam::where('language_id', $language->id)->orderBy('id', 'desc')->get();
        $team_section = CreativeTeamSection::where('language_id', $language->id)->first();

        return view('admin.creative.team.create', compact('teams', 'team_section'));
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
            'team_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('team_image')){

            // Get image file
            $team_image = $request->file('team_image');

            // Folder path
            $folder = 'uploads/creative/img/teams/';

            // Make image name
            $team_image_name = time().'-'.$team_image->getClientOriginalName();

            // Upload image
            $team_image->move($folder, $team_image_name);

            // Set input
            $input['team_image'] = $team_image_name;

        } else {
            // Set input
            $input['team_image'] = null;
        }

        // Record to database
        CreativeTeam::create([
            'language_id' => getLanguage()->id,
            'team_image' => $input['team_image'],
            'name' => $input['name'],
            'job' => $input['job'],
            'link_1' => $input['link_1'],
            'link_2' => $input['link_2'],
            'link_3' => $input['link_3'],
            'link_4' => $input['link_4'],
            'order' => $input['order']
        ]);

        return redirect()->route('team.create')
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
        $team = CreativeTeam::find($id);

        return view('admin.creative.team.edit', compact('team'));
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
            'team_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'order' => 'required|integer',
        ]);

        // Get model
        $team = CreativeTeam::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('team_image')){

            // Get image file
            $team_image = $request->file('team_image');

            // Folder path
            $folder ='uploads/creative/img/teams/';

            // Make image name
            $team_image_name =  time().'-'.$team_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$team->team_image));

            // Upload image
            $team_image->move($folder, $team_image_name);

            // Set input
            $input['team_image'] = $team_image_name;

        }

        // Record to database
        CreativeTeam::find($id)->update($input);

        return redirect()->route('team.create')
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
        $team = CreativeTeam::find($id);

        // Folder path
        $folder = 'uploads/creative/img/teams/';

        // Delete Image
        File::delete(public_path($folder.$team->team_image));

        // Delete record
        $team->delete();

        return redirect()->route('team.create')
            ->with('success', 'content.deleted_successfully');
    }
}
