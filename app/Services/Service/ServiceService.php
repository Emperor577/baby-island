<?php


namespace App\Services\Service;

use App\Models\Service;
use App\Services\Service\Contracts\ServiceService as ServiceServiceInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class ServiceService implements ServiceServiceInterface
{

    public function store(array $data)
    {
        $service = new Service();

        if (is_file(Arr::get($data, 'photo'))) {
            $images = Arr::get($data, 'photo')->getClientOriginalName();
            $images = time().'_'.$images; // Add current time before image name
            Arr::get($data, 'photo')->storeAs('public/service',$images);
            $service->photo = $images;
        }
        $service->save();

        $uz_data = array('title' => $data['title_uz']);
        $ru_data = array('title' => $data['title_ru']);

        $setTranslation = Service::where('id', $service->id)->first();
        $setTranslation->getNewTranslation('uz')->fill($uz_data);
        $setTranslation->getNewTranslation('ru')->fill($ru_data);

        $setTranslation->save();
    }

    public function update(array $data, $id)
    {
        $service = Service::find($id);
        $service->translate('ru')->title = $data['title_ru'];
        $service->translate('uz')->title = $data['title_uz'];
        if (is_file(Arr::get($data, 'photo'))) {
            Storage::disk('public')->delete('service/'.$service->photo);
            $images = Arr::get($data, 'photo')->getClientOriginalName();
            $images = time().'_'.$images; // Add current time before image name
            Arr::get($data, 'photo')->storeAs('public/service',$images);
            $service->photo = $images;
        }
        $service->save();
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        Storage::disk('public')->delete('service/'.$service->photo);
        $service->delete();
    }
}
