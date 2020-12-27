<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeServiceDetail;
use Illuminate\Http\Request;

class ServiceDetailController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // Retrieving a model
        $service_items = CreativeServiceDetail::orderBy('id', 'desc')->get();

        return view('admin.creative.service.service_detail.create', compact('service_items', 'id'));
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
            'creative_service_id' => 'required|integer',
            'title' => 'required',
            'desc' => 'required',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        CreativeServiceDetail::create([
            'creative_service_id' => $input['creative_service_id'],
            'title' => $input['title'],
            'desc' => $input['desc'],
            'order' => $input['order']
        ]);

        return redirect()->route('service-detail.create', $input['creative_service_id'])
            ->with('success', 'content.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($creative_service_id, $id)
    {
        // Retrieving models
        $service_item = CreativeServiceDetail::find($id);

        return view('admin.creative.service.service_detail.edit', compact('service_item', 'creative_service_id'));
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
            'title' => 'required',
            'desc' => 'required',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        CreativeServiceDetail::find($id)->update($input);

        return redirect()->route('service-detail.create', $input['creative_service_id'])
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
        $service_detail = CreativeServiceDetail::find($id);

        // Delete record
        $service_detail->delete();

        return redirect()->route('service-detail.create', $service_detail->creative_work_id)
            ->with('success', 'content.deleted_successfully');
    }
}
