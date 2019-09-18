<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/17/2019
 * Time: 21:57
 */

namespace App\Services\Testimonial;
use App\Models\Testimonial;
use App\Services\Testimonial\Contracts\TestimonialService as TestimonialServiceInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class TestimonialService implements TestimonialServiceInterface
{

    public function store(array $data)
    {
        $testimonial = new Testimonial();

        if (is_file(Arr::get($data, 'photo'))) {
            $images = Arr::get($data, 'photo')->getClientOriginalName();
            $images = time().'_'.$images; // Add current time before image name
            Arr::get($data, 'photo')->storeAs('public/testimonial',$images);
            $testimonial->photo = $images;
        }
        $testimonial->save();
        $uz_data = array('name' => $data['name_uz'], 'description' => $data['description_uz']);
        $ru_data = array('name' => $data['name_ru'], 'description' => $data['description_ru']);

        $setTranslation = Testimonial::where('id', $testimonial->id)->first();
        $setTranslation->getNewTranslation('uz')->fill($uz_data);
        $setTranslation->getNewTranslation('ru')->fill($ru_data);

        $setTranslation->save();
    }

    public function update(array $data, $id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->translate('ru')->name = $data['name_ru'];
        $testimonial->translate('ru')->description = $data['description_ru'];
        $testimonial->translate('uz')->name = $data['name_uz'];
        $testimonial->translate('uz')->description = $data['description_uz'];
        if (is_file(Arr::get($data, 'photo'))) {
            Storage::disk('public')->delete('testimonial/'.$testimonial->photo);
            $images = Arr::get($data, 'photo')->getClientOriginalName();
            $images = time().'_'.$images; // Add current time before image name
            Arr::get($data, 'photo')->storeAs('public/testimonial',$images);
            $testimonial->photo = $images;
        }
        $testimonial->save();
    }
}