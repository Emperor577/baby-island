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
use Illuminate\Support\Facades\Storage;

class PriceService implements PriceServiceInterface
{

    public function store(array $data)
    {
        $price = new Price();
        if (is_file(Arr::get($data, 'photo'))) {
            $images = Arr::get($data, 'photo')->getClientOriginalName();
            $images = time().'_'.$images; // Add current time before image name
            Arr::get($data, 'photo')->storeAs('public/price',$images);
            $price->photo = $images;
        }
        $price->save();
        $price_uz = [];
        $price_ru = [];

        for ($i = 0; $i < sizeof($data['price_title_ru']); $i ++) {
            $price_ru[$data['price_title_ru'][$i]] = $data['price_count_ru'][$i];
        }
        for ($i = 0; $i < sizeof($data['price_title_uz']); $i ++) {
            $price_uz[$data['price_title_uz'][$i]] = $data['price_count_uz'][$i];
        }

        $ru_data = array('title' => $data['title_ru'], 'price' => json_encode($price_ru));
        $uz_data = array('title' => $data['title_uz'], 'price' => json_encode($price_uz));

        $setTranslation = Price::where('id', $price->id)->first();
        $setTranslation->getNewTranslation('ru')->fill($ru_data);
        $setTranslation->getNewTranslation('uz')->fill($uz_data);
        $setTranslation->save();

    }

    public function update(array $data, $id)
    {
        $price = Price::find($id);
        $price_uz = [];
        $price_ru = [];

        for ($i = 0; $i < sizeof($data['price_title_ru']); $i ++) {
            $price_ru[$data['price_title_ru'][$i]] = $data['price_count_ru'][$i];
        }
        for ($i = 0; $i < sizeof($data['price_title_uz']); $i ++) {
            $price_uz[$data['price_title_uz'][$i]] = $data['price_count_uz'][$i];
        }

        $price->translate('ru')->title = $data['title_ru'];
        $price->translate('uz')->title = $data['title_uz'];
        $price->translate('uz')->price = json_encode($price_uz);
        $price->translate('ru')->price = json_encode($price_ru);

        if (is_file(Arr::get($data, 'photo'))) {
            Storage::disk('public')->delete('price/'.$price->photo);
            $images = Arr::get($data, 'photo')->getClientOriginalName();
            $images = time().'_'.$images; // Add current time before image name
            Arr::get($data, 'photo')->storeAs('public/price',$images);
            $price->photo = $images;
        }
        $price->save();
    }
}