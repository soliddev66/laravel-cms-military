<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $theme = Theme::first();

        return view('admin.theme.create', compact('theme'));
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
            'choose_theme' => 'required|in:0,1',
        ]);

        // Get All Request
        $input = $request->all();

        // Update user
        Theme::find($id)->update($input);

        return redirect()->route('theme.create')
            ->with('success', 'content.updated_successfully');
    }

}
