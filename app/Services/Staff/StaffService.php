<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/17/2019
 * Time: 21:57
 */

namespace App\Services\Staff;
use App\Models\Staff;
use App\Services\Staff\Contracts\StaffService as StaffServiceInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class StaffService implements StaffServiceInterface
{

    public function store(array $data)
    {
        $staff = new Staff();

        if (is_file(Arr::get($data, 'photo'))) {
            $images = Arr::get($data, 'photo')->getClientOriginalName();
            $images = time().'_'.$images; // Add current time before image name
            Arr::get($data, 'photo')->storeAs('public/staff',$images);
            $staff->photo = $images;
        }
        if (isset($data['contact'])) {
            $staff->contact = $data['contact'];
        }
        $staff->save();
        $uz_data = array('name' => $data['name_uz'], 'description' => $data['description_uz']);
        $ru_data = array('name' => $data['name_ru'], 'description' => $data['description_ru']);

        $setTranslation = Staff::where('id', $staff->id)->first();
        $setTranslation->getNewTranslation('uz')->fill($uz_data);
        $setTranslation->getNewTranslation('ru')->fill($ru_data);

        $setTranslation->save();
    }

    public function update(array $data, $id)
    {
        $staff = Staff::find($id);
        $staff->translate('ru')->name = $data['name_ru'];
        $staff->translate('ru')->description = $data['description_ru'];
        $staff->translate('uz')->name = $data['name_uz'];
        $staff->translate('uz')->description = $data['description_uz'];
        if (is_file(Arr::get($data, 'photo'))) {
            Storage::disk('public')->delete('staff/'.$staff->photo);
            $images = Arr::get($data, 'photo')->getClientOriginalName();
            $images = time().'_'.$images; // Add current time before image name
            Arr::get($data, 'photo')->storeAs('public/staff',$images);
            $staff->photo = $images;
        }
        if (isset($data['contact'])) {
            $staff->contact = $data['contact'];
        }
        $staff->save();
    }
}