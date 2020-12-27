<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeWorkDetail;
use Illuminate\Http\Request;

class WorkDetailController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // Retrieving a model
        $work_items = CreativeWorkDetail::orderBy('id', 'desc')->get();

        return view('admin.creative.work.work.work_detail.create', compact('work_items', 'id'));
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
            'creative_work_id' => 'required|integer',
            'title' => 'required',
            'desc' => 'required',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        CreativeWorkDetail::create([
            'creative_work_id' => $input['creative_work_id'],
            'title' => $input['title'],
            'desc' => $input['desc'],
            'order' => $input['order']
        ]);

        return redirect()->route('work-detail.create', $input['creative_work_id'])
            ->with('success', 'content.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($creative_work_id, $id)
    {
        // Retrieving models
        $work_item = CreativeWorkDetail::find($id);

        return view('admin.creative.work.work.work_detail.edit', compact('work_item', 'creative_work_id'));
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
        CreativeWorkDetail::find($id)->update($input);

        return redirect()->route('work-detail.create', $input['creative_work_id'])
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
        $work_detail = CreativeWorkDetail::find($id);

        // Delete record
        $work_detail->delete();

        return redirect()->route('work-detail.create', $work_detail->creative_work_id)
            ->with('success', 'content.deleted_successfully');
    }
}
