<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativePrice;
use App\Models\Admin\Creative\CreativePriceSection;
use Illuminate\Http\Request;

class PriceController extends Controller
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
        $prices = CreativePrice::where('language_id', $language->id)->orderBy('id', 'desc')->get();
        $price_section = CreativePriceSection::where('language_id', $language->id)->first();

        return view('admin.creative.price.create', compact('prices', 'price_section'));
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
            'time' => 'required|integer|in:0,1',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        CreativePrice::create([
            'language_id' => getLanguage()->id,
            'icon' => $input['icon'],
            'title' => $input['title'],
            'currency' => $input['currency'],
            'price' => $input['price'],
            'time' => $input['time'],
            'desc' => $input['desc'],
            'btn_name' => $input['btn_name'],
            'btn_link' => $input['btn_link'],
            'order' => $input['order']
        ]);

        return redirect()->route('price.create')
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
        $price = CreativePrice::find($id);

        return view('admin.creative.price.edit', compact('price'));
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
            'time' => 'required|integer|in:0,1',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        CreativePrice::find($id)->update($input);

        return redirect()->route('price.create')
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
        $price = CreativePrice::find($id);

        // Delete record
        $price->delete();

        return redirect()->route('price.create')
            ->with('success', 'content.deleted_successfully');
    }
}
