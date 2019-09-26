<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/4/2019
 * Time: 18:38
 */
namespace App\Services\Slider;
use App\Models\Slider;
use App\Services\Slider\Contracts\SliderService as SliderServiceInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class SliderService implements SliderServiceInterface
{

    public function store(array $data)
    {
        $slider = new Slider();

        if (is_file(Arr::get($data, 'photo'))) {
            $images = Arr::get($data, 'photo')->getClientOriginalName();
            $images = time().'_'.$images; // Add current time before image name
            Arr::get($data, 'photo')->storeAs('public/slider',$images);
            $slider->photo = $images;
        }
        $slider->save();
        $uz_data = array('text' => $data['text_uz'], 'title' => $data['title_uz']);
        $ru_data = array('text' => $data['text_ru'], 'title' => $data['title_ru']);

        $setTranslation = Slider::where('id', $slider->id)->first();
        $setTranslation->getNewTranslation('uz')->fill($uz_data);
        $setTranslation->getNewTranslation('ru')->fill($ru_data);

        $setTranslation->save();
    }

    public function update(array $data, $id)
    {
        $slider = Slider::find($id);
        $slider->translate('ru')->title = $data['title_ru'];
        $slider->translate('ru')->text = $data['text_ru'];
        $slider->translate('uz')->title = $data['title_uz'];
        $slider->translate('uz')->text = $data['text_uz'];
      
        if (is_file(Arr::get($data, 'photo'))) {
            Storage::disk('public')->delete('slider/'.$slider->photo);
            $images = Arr::get($data, 'photo')->getClientOriginalName();
            $images = time().'_'.$images; // Add current time before image name
            Arr::get($data, 'photo')->storeAs('public/slider',$images);
            $slider->photo = $images;
        }
        $slider->save();
    }
}
