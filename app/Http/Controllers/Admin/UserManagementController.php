<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::get()->all();
        return view('admin.user_management.list', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieving models
        $user = User::find($id);

        return view('admin.user_management.edit', compact('user'));
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
        // Get All Request
        $input = $request->all();
        // Update to database
        User::find($id)->update($input);

        return redirect()->route('user.management')
            ->with('success', 'content.updated_successfully');
    }

    public function destroy($id)
    {
        // Retrivieng a model
        $user = User::find($id);

        // Delete model
        $user->delete();

        return redirect()->route('user.management')
            ->with('success', 'content.deleted_successfully');
    }

}
