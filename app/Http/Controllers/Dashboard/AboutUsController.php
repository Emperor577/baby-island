<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AboutUs\Contracts\AboutUsService as AboutServiceInterface;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about_us = AboutUs::paginate(10);
        return view('admin.about-us.index', compact('about_us'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about-us.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param AboutServiceInterface $abouts
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AboutServiceInterface $abouts)
    {
        $this->validate($request, [
           'text_ru' => 'required',
           'text_uz' => 'required',
           'photo' => 'required'
        ]);
       $abouts->store($request->all());
        return redirect()->route('admin.about-us.index');
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
        return view('admin.about-us.edit', ['about_us' => AboutUs::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @param AboutServiceInterface $abouts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, AboutServiceInterface $abouts)
    {
        $this->validate($request, [
            'text_ru' => 'required',
            'text_uz' => 'required',
        ]);

        $abouts->update($request->all(), $id);
        return redirect()->route('admin.about-us.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = AboutUs::find($id);
        Storage::disk('public')->delete('about-us/'.$about->photo);
        $about->delete();

        return redirect()->route('admin.about-us.index');
    }

    public function imageDestroy($id)
    {
        $about = AboutUs::find($id);
        Storage::disk('public')->delete('about-us/'.$about->photo);
        $about->photo = '';
        $about->save();
    }
}
