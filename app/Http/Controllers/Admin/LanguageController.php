<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Language;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LanguageController extends Controller
{

    // Set session for language
    public function set_locale($language_id){


        // Via the global helper...
        session(['language_id_from_dropdown' => $language_id]);

        $language_id_from_dropdown = session()->get('language_id_from_dropdown');

        $language = Language::find($language_id_from_dropdown);

        session(['language_name_from_dropdown' => $language->language_name]);
        session(['language_code_from_dropdown' => $language->language_code]);
        session(['language_direction_from_dropdown' => $language->direction]);


        return redirect()->back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.language.create');
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
            'language_name' => 'required|unique:languages',
            'language_code' => 'required|unique:languages',
            'direction' => 'required|integer|in:0,1',
            'display_dropdown' => 'required|integer|in:0,1',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        Language::create([
            'language_name' => $input['language_name'],
            'language_code' => $input['language_code'],
            'direction' => $input['direction'],
            'display_dropdown' => $input['display_dropdown'],
            'default_site_language' => 0,
            'status' => 0
        ]);

        return redirect()->route('language.create')
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
        $language = Language::find($id);

        return view('admin.language.edit', compact('language'));
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
            'language_name'   =>  [
                'required',
                Rule::unique('languages')->ignore($id),
            ],
            'language_code'   =>  [
                'required',
                Rule::unique('languages')->ignore($id),
            ],
            'direction' => 'required|integer|in:0,1',
            'display_dropdown' => 'required|integer|in:0,1',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        Language::find($id)->update($input);

        return redirect()->route('language.create')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_language(Request $request)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Retrieve a model
        $language = Language::find($input['language_id']);


        if (isset($language)) {

            // Retrieve a model
            $languages = Language::all();

            foreach ($languages as $language) {

                if ($language->id == $input['language_id']) {

                    // Update to database default_site_language = 1
                    Language::find($language->id)->update(['default_site_language' => 1]);

                } else {

                    // Update to database default_site_language = 0
                    Language::find($language->id)->update(['default_site_language' => 0]);

                }

            }

            return redirect()->route('language.create')
                ->with('success', 'content.updated_successfully');

        } else {

            return redirect()->route('language.create')
                ->with('warning','content.please_try_again');

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_processed_language(Request $request)
    {
        // Form validation
        $request->validate([
            'language_id' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Retrieve a model
        $language = Language::find($input['language_id']);


        if (isset($language)) {

            // Retrieve a model
            $languages = Language::all();

            foreach ($languages as $language) {

                if ($language->id == $input['language_id']) {

                    // Update to database status = 1
                    Language::find($language->id)->update(['status' => 1]);

                } else {

                    // Update to database status = 0
                    Language::find($language->id)->update(['status' => 0]);

                }

            }

            return redirect()->back()
                ->with('success', 'content.updated_successfully');

        } else {

            return redirect()->back()
                ->with('warning','content.please_try_again');

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_display_dropdown($id)
    {
        //Find a model
        $language = Language::find($id);

        if ($language->display_dropdown == 1) {

            $display_dropdown = 0;

        } else {

            $display_dropdown = 1;

        }

        // Update to database
        Language::find($id)->update(['display_dropdown' => $display_dropdown]);

        return redirect()->route('language.create')
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
        if ($id == 1) {

            return redirect()->route('language.create')
                ->with('warning', 'content.you_are_not_authorized');

        }

        // Retrieve a model
        $language = Language::find($id);

        if (session()->has('language_id_from_dropdown')) {

            $session_language_id = session()->get('language_id_from_dropdown');

            $session_language = Language::find($session_language_id);

            if ($language->id == $session_language->id) {

                // Forget a single key...
                session()->forget('language_id_from_dropdown');
                session()->forget('language_name_from_dropdown');
                session()->forget('language_code_from_dropdown');
                session()->forget('language_direction_from_dropdown');

            }

        }

        if ($language->status == 1) {

            // Update to database
            Language::find(1)->update(['status' => 1]);

        }

        // Delete record
        $language->delete();

        return redirect()->route('language.create')
            ->with('success', 'content.deleted_successfully');
    }
}
