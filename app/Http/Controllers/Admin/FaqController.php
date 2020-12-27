<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Faq;
use App\Models\Admin\FaqSection;
use Illuminate\Http\Request;

class FaqController extends Controller
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
        $faqs = Faq::where('language_id', $language->id)->get();
        $faq_section = FaqSection::where('language_id', $language->id)->orderBy('id', 'desc')->first();

        return view('admin.faq.create', compact('faqs', 'faq_section'));
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
            'question' => 'required',
            'answer' => 'required',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        Faq::create([
            'language_id' => getLanguage()->id,
            'question' => $input['question'],
            'answer' => $input['answer'],
            'order' => $input['order']
        ]);

        return redirect()->route('faq.create')
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
        $faq = Faq::find($id);

        return view('admin.faq.edit', compact('faq'));
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
            'question' => 'required',
            'answer' => 'required',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        Faq::find($id)->update($input);

        return redirect()->route('faq.create')
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
        $faq = Faq::find($id);

        // Delete record
        $faq->delete();

        return redirect()->route('faq.create')
            ->with('success', 'content.deleted_successfully');
    }
}
