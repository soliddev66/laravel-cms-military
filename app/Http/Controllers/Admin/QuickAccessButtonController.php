<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\QuickAccessButton;
use Illuminate\Http\Request;

class QuickAccessButtonController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving a model
        $quick_access = QuickAccessButton::first();

        return view('admin.contact.quick_access.create', compact('quick_access'));
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
            'contact' => 'required|max:255',
            'email_or_phone' => 'max:255',
            'status_phone' => 'integer|in:0,1',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        QuickAccessButton::firstOrCreate([
            'social_media' => $input['social_media'],
            'link' => $input['link'],
            'status' => $input['status'],
            'contact' => $input['contact'],
            'email_or_phone' => $input['email_or_phone'],
            'status_phone' => $input['status_phone']
        ]);

        return redirect()->route('quick-access.create')
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
            'social_media' => 'required|max:255',
            'link' => 'max:255',
            'status' => 'integer|in:0,1',
            'contact' => 'required|max:255',
            'email_or_phone' => 'max:255',
            'status_phone' => 'integer|in:0,1',
        ]);

        // Get All Request
        $input = $request->all();

        // Update to database
        QuickAccessButton::find($id)->update($input);

        return redirect()->route('quick-access.create')
            ->with('success', 'content.updated_successfully');
    }

}
