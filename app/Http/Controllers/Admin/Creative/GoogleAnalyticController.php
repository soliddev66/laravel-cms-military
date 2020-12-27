<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeGoogleAnalytic;
use Illuminate\Http\Request;

class GoogleAnalyticController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving a model
        $google_analytic = CreativeGoogleAnalytic::first();

        return view('admin.creative.setting.google_analytic.create', compact('google_analytic'));
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
            'google_analytic' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        CreativeGoogleAnalytic::firstOrCreate([
            'google_analytic' => $input['google_analytic']
        ]);

        return redirect()->route('google-analytic.create')
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
            'google_analytic' => 'required',
        ]);

        // Get All Request
        $input = $request->all();

        // Update model
        CreativeGoogleAnalytic::find($id)->update($input);

        return redirect()->route('google-analytic.create')
            ->with('success', 'content.updated_successfully');
    }


}
