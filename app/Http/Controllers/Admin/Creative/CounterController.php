<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeCounter;
use Illuminate\Http\Request;

class CounterController extends Controller
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
        $counters = CreativeCounter::where('language_id', $language->id)->orderBy('id', 'desc')->get();

        return view('admin.creative.counter.create', compact('counters'));
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
            'timer' => 'required|integer',
            'desc' => 'required',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        CreativeCounter::create([
            'language_id' => getLanguage()->id,
            'desc' => $input['desc'],
            'timer' => $input['timer'],
            'order' => $input['order']
        ]);

        return redirect()->route('counter.create')
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
        $counter = CreativeCounter::find($id);

        return view('admin.creative.counter.edit', compact('counter'));
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
            'timer' => 'required|integer',
            'desc' => 'required',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        CreativeCounter::find($id)->update($input);

        return redirect()->route('counter.create')
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
        $counter = CreativeCounter::find($id);

        // Delete record
        $counter->delete();

        return redirect()->route('counter.create')
            ->with('success', 'content.deleted_successfully');
    }
}
