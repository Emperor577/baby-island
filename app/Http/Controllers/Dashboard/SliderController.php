<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Slider\Contracts\SliderService as SliderServiceInterface;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::paginate(10);
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param SliderServiceInterface $slider
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SliderServiceInterface $slider)
    {
        $this->validate($request, [
            'title_ru' => 'required',
            'text_ru'  => 'required',
            'title_uz' => 'required',
            'text_uz'  => 'required',
            'photo' => 'required'
        ]);
        $slider->store($request->all());
        return redirect()->route('admin.sliders.index');
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
        return view('admin.slider.edit', ['slider' => Slider::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @param SliderServiceInterface $slider
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, $id,  SliderServiceInterface $slider)
    {
        $this->validate($request, [
            'title_ru' => 'required',
            'text_ru'  => 'required',
            'title_uz' => 'required',
            'text_uz'  => 'required',
        ]);
        $slider->update($request->all(), $id);

        return redirect()->route('admin.sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        Storage::disk('public')->delete('slider/'.$slider->photo);
        $slider->delete();

        return redirect()->route('admin.sliders.index');
    }

    public function imageDestroy($id)
    {
        $slider = Slider::find($id);
        Storage::disk('public')->delete('slider/'.$slider->photo);
        $slider->photo = '';
        $slider->save();
    }
}
