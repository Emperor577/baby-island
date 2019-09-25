<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Gallery\Contracts\GalleryService as GalleryServiceInterface;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::paginate(10);
        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param GalleryServiceInterface $galleryService
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, GalleryServiceInterface $galleryService)
    {
        $this->validate($request, [
            'title_uz' => 'required',
            'title_ru' => 'required',
            'photo' => 'required',
        ]);
        $galleryService->store($request->all());
        return redirect()->route('admin.gallery.index');
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
        return view('admin.gallery.edit', ['gallery' => Gallery::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @param GalleryServiceInterface $galleryService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, GalleryServiceInterface $galleryService)
    {
        $this->validate($request, [
           'title_uz' => 'required',
           'title_ru' => 'required'
        ]);
        $galleryService->update($request->all(), $id);
        return redirect()->route('admin.gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        Storage::disk('public')->delete('gallery/'.$gallery->photo);
        $gallery->delete();

        return redirect()->route('admin.gallery.index');
    }

    public function imageDestroy($id)
    {
        $gallery = Gallery::find($id);
        Storage::disk('public')->delete('gallery/'.$gallery->photo);
        $gallery->photo = '';
        $gallery->save();
    }
}
