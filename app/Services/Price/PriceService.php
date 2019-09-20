<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/18/2019
 * Time: 22:32
 */

namespace App\Services\Price;
use App\Models\Price;
use App\Services\Price\Contracts\PriceService as PriceServiceInterface;
use Illuminate\Support\Arr;

class PriceService implements PriceServiceInterface
{

    public function store(array $data)
    {
        $price = new Price();
        for ($i = 0; $i < sizeof($data['price_title_ru']); $i ++) {
            $price_ru[$data['price_title_ru'][$i]] = $data['price_count_ru'][$i];
        }
        for ($i = 0; $i < sizeof($data['price_title_uz']); $i ++) {
            $price_uz[$data['price_title_uz'][$i]] = $data['price_count_uz'][$i];
        }
        if (is_file(Arr::get($data, 'photo'))) {
            $images = Arr::get($data, 'photo')->getClientOriginalName();
            $images = time().'_'.$images; // Add current time before image name
            Arr::get($data, 'photo')->storeAs('public/price',$images);
            $price->photo = $images;
        }
        $price->save();
        $uz_data = array('text' => $data['text_uz'], 'title' => $data['title_uz']);
        $ru_data = array('text' => $data['text_ru'], 'title' => $data['title_ru']);

        $setTranslation = Slider::where('id', $slider->id)->first();
        $setTranslation->getNewTranslation('uz')->fill($uz_data);
        $setTranslation->getNewTranslation('ru')->fill($ru_data);

        $setTranslation->save();

    }

    public function update(array $data, $id)
    {

    }
}