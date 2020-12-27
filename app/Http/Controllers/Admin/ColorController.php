<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $color = Color::first();;

        return view('admin.setting.color.create', compact('color'));
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
            'color_code' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        Color::firstOrCreate([
            'color_code' => $input['color_code']
        ]);

        return redirect()->route('color.create')
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
            'color_code' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Update to database
        Color::find($id)->update($input);

        return redirect()->route('color.create')
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
        $color = Color::find($id);

        // Delete record
        $color->delete();

        return redirect()->route('color.create')
            ->with('success', 'content.deleted_successfully');
    }
}
