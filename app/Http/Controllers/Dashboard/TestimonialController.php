<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Testimonial\Contracts\TestimonialService as TestimonialServiceInterface;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::paginate(10);
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param TestimonialServiceInterface $testimonialService
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TestimonialServiceInterface $testimonialService)
    {
        $this->validate($request,[
            'name_uz' => 'required',
            'description_uz' => 'required',
            'name_ru' => 'required',
            'description_ru' => 'required',
            'photo' => 'required'
        ]);

        $testimonialService->store($request->all());
        return redirect()->route('admin.testimonial.index');
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
        return view('admin.testimonial.edit', ['testimonial' => Testimonial::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @param TestimonialServiceInterface $testimonialService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, TestimonialServiceInterface $testimonialService)
    {
        $this->validate($request, [
            'name_uz' => 'required',
            'description_uz' => 'required',
            'name_ru' => 'required',
            'description_ru' => 'required'
        ]);

        $testimonialService->update($request->all(), $id);
        return redirect()->route('admin.testimonial.index');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        Storage::disk('public')->delete('testimonial/'.$testimonial->photo);
        $testimonial->delete();

        return redirect()->route('admin.testimonial.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function imageDestroy($id)
    {
        $testimonial = Testimonial::find($id);
        Storage::disk('public')->delete('testimonial/'.$testimonial->photo);
        $testimonial->photo = '';
        $testimonial->save();
    }
}
