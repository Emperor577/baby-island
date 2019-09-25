<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/13/2019
 * Time: 23:48
 */
namespace App\Services\AboutUs;
use App\Models\AboutUs;
use App\Models\AboutUsTranslation;
use App\Services\AboutUs\Contracts\AboutUsService as AboutUsServiceInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class AboutUsService implements AboutUsServiceInterface
{

    public function store(array $data)
    {
        $about = new AboutUs();
        if (is_file(Arr::get($data, 'photo'))) {
            $images = Arr::get($data, 'photo')->getClientOriginalName();
            $images = time().'_'.$images; // Add current time before image name
            Arr::get($data, 'photo')->storeAs('public/about-us',$images);
            $about->photo = $images;
        }
        $about->save();

        $uz_data = array('text' => $data['text_uz']);
        $ru_data = array('text' => $data['text_ru']);

        $setTranslation = AboutUs::where('id', $about->id)->first();
        $setTranslation->getNewTranslation('uz')->fill($uz_data);
        $setTranslation->getNewTranslation('ru')->fill($ru_data);

        $setTranslation->save();

    }

    public function update(array $data, $id)
    {
        $about = AboutUs::find($id);
        $about->translate('ru')->text = $data['text_ru'];
        $about->translate('uz')->text = $data['text_uz'];


        if (is_file(Arr::get($data, 'photo'))) {
            Storage::disk('public')->delete('about-us/'.$about->photo);
            $images = Arr::get($data, 'photo')->getClientOriginalName();
            $images = time().'_'.$images; // Add current time before image name
            Arr::get($data, 'photo')->storeAs('public/about-us',$images);
            $about->photo = $images;
        }
        $about->save();

    }
}