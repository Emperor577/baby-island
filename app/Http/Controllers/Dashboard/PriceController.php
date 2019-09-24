<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Price\Contracts\PriceService as PriceServiceInterface;
use Illuminate\Support\Facades\Storage;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Price::all();
        return view('admin.price.index', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.price.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param PriceServiceInterface $priceService
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PriceServiceInterface $priceService)
    {
        $this->validate($request, [
           'title_ru' => 'required',
           'title_uz' => 'required',
           'price_count_ru' => 'required',
           'price_count_uz' => 'required',
           'price_title_ru' => 'required',
           'price_title_uz' => 'required',
            'photo' => 'required'
        ]);

        $priceService->store($request->all());
        return redirect()->route('admin.price.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.price.edit', ['price' => Price::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @param PriceServiceInterface $priceService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, PriceServiceInterface $priceService)
    {
        $this->validate($request, [
            'title_ru' => 'required',
            'title_uz' => 'required',
            'price_count_ru' => 'required',
            'price_count_uz' => 'required',
            'price_title_ru' => 'required',
            'price_title_uz' => 'required',
        ]);
        $priceService->update($request->all(), $id);

        return redirect()->route('admin.price.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = Price::find($id);
        Storage::disk('public')->delete('price/'.$price->photo);
        $price->delete();

        return redirect()->route('admin.price.index');
    }

    public function imageDestroy($id)
    {
        $price = Price::find($id);
        Storage::disk('public')->delete('price/'.$price->photo);
        $price->photo = '';
        $price->save();
    }
}
