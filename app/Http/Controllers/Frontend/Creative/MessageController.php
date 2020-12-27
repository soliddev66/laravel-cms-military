<?php

namespace App\Http\Controllers\Frontend\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
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
            'name'  => 'required|max:255',
            'email' => 'required|max:255',
            'subject' => 'required|max:255',
            'message' => 'required|max:500',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        CreativeMessage::firstOrCreate([
            'name' => $input['name'],
            'email' => $input['email'],
            'subject' => $input['subject'],
            'message' => $input['message'],
        ]);

        return redirect()->to('/'.'#contact')
            ->with('success', 'frontend.your_message_has_been_delivered');
    }

}
