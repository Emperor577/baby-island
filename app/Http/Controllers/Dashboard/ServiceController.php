<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Service\Contracts\ServiceService as ServiceServiceInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ServiceController extends Controller
{
    public $path = 'admin.service.';
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $services = Service::paginate(10);
        return view($this->path.'index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view($this->path.'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param ServiceServiceInterface $service
     * @return void
     * @throws ValidationException
     */
    public function store(Request $request, ServiceServiceInterface $service)
    {
        $this->validate($request, [
            'title_ru' => 'required',
            'title_uz' => 'required',
            'photo' => 'required'
        ]);
        $service->store($request->all());

        return redirect()->route('admin.service.index');
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
        return view($this->path.'edit', [
            'service' => Service::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @param ServiceServiceInterface $service
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, $id, ServiceServiceInterface $service)
    {
        $this->validate($request, [
            'title_ru' => 'required',
            'title_uz' => 'required',
        ]);
        $service->update($request->all(), $id);

        return redirect()->route('admin.service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param ServiceServiceInterface $service
     * @return void
     */
    public function destroy($id, ServiceServiceInterface $service)
    {
        $service->destroy($id);
        return redirect()->route('admin.service.index');
    }

    public function imageDestroy($id)
    {
        $service = Service::find($id);
        Storage::disk('public')->delete('service/'.$service->photo);
        $service->photo = '';
        $service->save();
    }
}
