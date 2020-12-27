<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Service;
use App\Models\Admin\ServiceSection;
use Illuminate\Http\Request;

class ServiceController extends Controller
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
        $services = Service::where('language_id', $language->id)->orderBy('id', 'desc')->get();
        $service_section = ServiceSection::where('language_id', $language->id)->first();

        return view('admin.service.create', compact('services', 'service_section'));
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
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        Service::create([
            'language_id' => getLanguage()->id,
            'icon' => $input['icon'],
            'title' => $input['title'],
            'desc' => $input['desc'],
            'order' => $input['order']
        ]);

        return redirect()->route('service.create')
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
        $service = Service::find($id);

        return view('admin.service.edit', compact('service'));
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
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        Service::find($id)->update($input);

        return redirect()->route('service.create')
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
        $service = Service::find($id);

        // Delete record
        $service->delete();

        return redirect()->route('service.create')
            ->with('success', 'content.deleted_successfully');
    }
}
