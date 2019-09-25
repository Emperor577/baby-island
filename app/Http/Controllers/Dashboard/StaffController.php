<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Staff\Contracts\StaffService as StaffServiceInterface;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::paginate(10);
        return view('admin.staff.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param StaffServiceInterface $staffService
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, StaffServiceInterface $staffService)
    {
        $this->validate($request, [
            'name_uz' => 'required',
            'name_ru' => 'required',
            'description_uz' => 'required',
            'description_ru' => 'required',
            'photo' => 'required',
        ]);

        $staffService->store($request->all());
        return redirect()->route('admin.staff.index');
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
        return view('admin.staff.edit',['staff' => Staff::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @param StaffServiceInterface $staffService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, StaffServiceInterface $staffService)
    {
        $this->validate($request, [
            'name_uz' => 'required',
            'name_ru' => 'required',
            'description_uz' => 'required',
            'description_ru' => 'required',
        ]);
        $staffService->update($request->all(), $id);

        return redirect()->route('admin.staff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::find($id);
        Storage::disk('public')->delete('staff/'.$staff->photo);
        $staff->delete();

        return redirect()->route('admin.staff.index');
    }

    /**
     * @param $id
     */
    public function imageDestroy($id)
    {
        $staff = Staff::find($id);
        Storage::disk('public')->delete('staff/'.$staff->photo);
        $staff->photo = '';
        $staff->save();
    }
}
