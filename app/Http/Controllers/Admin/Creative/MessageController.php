<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeMessage;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models
        $messages = CreativeMessage::all()->sortByDesc("id");

        return view('admin.creative.contact.message.index', compact('messages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // Update to database
        CreativeMessage::find($id)->update(['read' => 1]);

        return redirect()->route('message.index')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function mark_all_read_update()
    {
        $messages = CreativeMessage::all()->where('read', 0);

        // Update to database
        foreach ($messages as $message) {
            CreativeMessage::find($message->id)->update(['read' => 1]);
        }

        return redirect()->route('message.index')
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
        $message = CreativeMessage::find($id);

        // Delete record
        $message->delete();

        return redirect()->route('message.index')
            ->with('success', 'content.deleted_successfully');
    }
}
